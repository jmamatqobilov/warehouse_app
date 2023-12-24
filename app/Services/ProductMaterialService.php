<?php
namespace App\Services;

use App\Models\ProductMaterial;

class ProductMaterialService extends BaseService
{
    public function __construct(ProductMaterial $model)
    {
        $this->model = $model;
    }

    public function productMaterialQtys($productId)
    {
        return $this->model->where('product_id', $productId)->with('material.werehouses')->get();
    }
}