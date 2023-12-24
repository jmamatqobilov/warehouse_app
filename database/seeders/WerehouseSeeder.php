<?php

namespace Database\Seeders;

use App\Models\Werehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WerehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Werehouse::create([
            "material_id"=>1,
            "remainder"=>12,
            "price"=>1500
        ]);
        Werehouse::create([
            "material_id"=>1,
            "remainder"=>200,
            "price"=>1600
        ]);
        Werehouse::create([
            "material_id"=>3,
            "remainder"=>40,
            "price"=>500
        ]);
        Werehouse::create([
            "material_id"=>3,
            "remainder"=>300,
            "price"=>550
        ]);
        Werehouse::create([
            "material_id"=>2,
            "remainder"=>500,
            "price"=>300
        ]);
        Werehouse::create([
            "material_id"=>4,
            "remainder"=>1000,
            "price"=>2000
        ]);
    }
}
