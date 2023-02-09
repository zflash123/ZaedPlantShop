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
            'image_name' => 'alocasia-cuprea',
            'product_category_id' => '1',
        ]);
        Product::create([
            'name' => 'Peperomia Watermelon',
            'stock' => '2',
            'price' => '12000',
            'image_name' => 'peperomia-watermelon',
            'product_category_id' => '1',
        ]);
        Product::create([
            'name' => 'Jade Plant',
            'stock' => '4',
            'price' => '8000',
            'image_name' => 'jade-plant',
            'product_category_id' => '1',
        ]);
        Product::create([
            'name' => 'Humus Soil',
            'stock' => '5',
            'price' => '8000',
            'image_name' => 'humus-soil',
            'product_category_id' => '2',
        ]);
        Product::create([
            'name' => 'Psyllium Husk',
            'stock' => '5',
            'price' => '8000',
            'image_name' => 'psyllium-husk',
            'product_category_id' => '2',
        ]);
        Product::create([
            'name' => 'Burned Rice Husk',
            'stock' => '3',
            'price' => '11000',
            'image_name' => 'burned-rice-husk',
            'product_category_id' => '2',
        ]);
        Product::create([
            'name' => 'Mini Bowl Ceramic Pot',
            'stock' => '11',
            'price' => '5000',
            'image_name' => 'mini-bowl-ceramic-pot',
            'product_category_id' => '3',
        ]);
        Product::create([
            'name' => 'Hexagon Ceramic Pot',
            'stock' => '11',
            'price' => '5000',
            'image_name' => 'hexagon-ceramic-pot',
            'product_category_id' => '3',
        ]);
        Product::create([
            'name' => 'Ceramic Pot D9',
            'stock' => '11',
            'price' => '5000',
            'image_name' => 'ceramic-pot-d9',
            'product_category_id' => '3',
        ]);
    }
}
