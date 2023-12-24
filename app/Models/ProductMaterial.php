<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// Bu model many to many bog'lanishda o'zi aslida shart 
//emas , ammo bizda qunatity ha yordamchi tablisaga qushilgani uchun model yaratishimiz kerak




class ProductMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'material_id',
        'qty'
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function material(){
        return $this->belongsTo(Material::class,'material_id','id');
    }
}
