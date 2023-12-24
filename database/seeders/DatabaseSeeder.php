<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(MaterialSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductMaterialSeeder::class);
        $this->call(WerehouseSeeder::class);
    }
}
