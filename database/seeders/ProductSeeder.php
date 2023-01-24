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
            'name' => 'Alocasia Cuprea',
            'stock' => '3',
            'price' => '23000',
            'product_category_id' => '1',
        ]);
        Product::create([
            'name' => 'Peperomia Watermelon',
            'stock' => '2',
            'price' => '12000',
            'product_category_id' => '1',
        ]);
        Product::create([
            'name' => 'Jade Plant',
            'stock' => '4',
            'price' => '8000',
            'product_category_id' => '1',
        ]);
        Product::create([
            'name' => 'Psyllium Husk',
            'stock' => '5',
            'price' => '8000',
            'product_category_id' => '2',
        ]);
        Product::create([
            'name' => 'Small Pot',
            'stock' => '11',
            'price' => '5000',
            'product_category_id' => '3',
        ]);
    }
}
