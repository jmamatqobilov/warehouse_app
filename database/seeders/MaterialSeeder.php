<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Material::create([
            "name"=>"Mato",
        ]);
        Material::create([
            "name"=>"Tugma",
        ]);
        Material::create([
            "name"=>"Ip",
        ]);
        Material::create([
            "name"=>"Zamok",
        ]);
    }
}
