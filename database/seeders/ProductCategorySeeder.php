<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::create(['name' => 'Plants']);
        ProductCategory::create(['name' => 'Media']);
        ProductCategory::create(['name' => 'Fertilizer']);
    }
}
