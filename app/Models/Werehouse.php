<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Werehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_id',
        'remainder',
        'price'
    ];

    public function material(){
        return $this->belongsTo(Werehouse::class,'material_id','id');
    }
    
}
