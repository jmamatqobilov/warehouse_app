<?php
namespace App\Services;

use App\Models\Material;

class MaterialService extends BaseService
{
    public function __construct(Material $model)
    {
        $this->model = $model;
    }
}