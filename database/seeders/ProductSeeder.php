<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Aglonema',
            'stock' => '4',
            'price' => '23000',
            'product_category_id' => '1',
        ]);
        Product::create([
            'name' => 'Psyllium Husk',
            'stock' => '5',
            'price' => '8000',
            'product_category_id' => '3',
        ]);
        Product::create([
            'name' => 'Small Pot',
            'stock' => '11',
            'price' => '5000',
            'product_category_id' => '4',
        ]);
    }
}
