<?php
namespace App\Services;

use App\Models\Werehouse;

class WerehouseService extends BaseService
{
    public function __construct(
        Werehouse $model,
        protected ProductService $productService,
        protected MaterialService $materialService,
        protected ProductMaterialService $productMaterialService
    )
    {
        $this->model = $model;
    }


    public function getInfo($data)
    {
        $result = [];
        $busy = [];
        $halfBusy = [];
        $products = $data['products'];
        foreach ($products as $p) { 
            $product = $this->productService->getById($p['id']);
            $data = [];
            $data['product_name'] = $product->name;
            $data['product_qty'] = $p['product_qty'];  
            $materialQtys = $this->productMaterialService->productMaterialQtys($p['id']);
            $info = [];
            foreach ($materialQtys as $qty) {
                $quantity = $p['product_qty'] * $qty->quantity;
                $enough = true;
                foreach ($qty->material->werehouses->toArray() as $werehouse) {
                    $wh = $werehouse;
                    if(isset($busy[$werehouse['id']])) {
                        $enough = false;
                        continue;
                    }
                    if(isset($halfBusy[$werehouse['id']])) {
                        $wh = $halfBusy[$werehouse['id']];
                    }
                    if($wh['remainder'] > $quantity) {
                        $enough = true;
                        $wh['remainder'] -= $quantity;
                        $halfBusy[$wh['id']] = $wh;
                        $info[] = [
                            'werehouse_id' => $wh['id'],
                            'material_name' => $qty->material->name,
                            'qty' => $quantity,
                            'price' => $wh['price']
                        ];
                        break;
                    } else if($wh['remainder'] < $quantity) {
                        $enough = false;
                        $busy[$wh['id']] = $wh;
                        $quantity -= $wh['remainder'];
                        $info[] = [
                            'werehouse_id' => $wh['id'],
                            'material_name' => $qty->material->name,
                            'qty' => $wh['remainder'],
                            'price' => $wh['price']
                        ];
                    } else {
                        $enough = true;
                        $busy[$wh['id']] = $wh;
                        $info[] = [
                            'werehouse_id' => $wh['id'],
                            'material_name' => $qty->material->name,
                            'qty' => $wh['remainder'],
                            'price' => $wh['price']
                        ];
                    }
                }
                if(!$enough && $quantity != 0) {
                    $info[] = [
                        'werehouse_id' => null,
                        'material_name' => $qty->material->name,
                        'qty' => $quantity,
                        'price' => null
                    ];
                }
            }            
            $data['product_materials'] = $info;    
            $result[] = $data;
        }        
        return response()->json(['result' => $result]);
    }
}
 
