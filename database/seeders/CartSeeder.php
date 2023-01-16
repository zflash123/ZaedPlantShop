<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cart::create([
            'user_id' => 2,
            'product_id' => 1,
            'total_added' => 2,
        ]);
        Cart::create([
            'user_id' => 1,
            'product_id' => 2,
            'total_added' => 3,
        ]);
        Cart::create([
            'user_id' => 1,
            'product_id' => 3,
            'total_added' => 1,
        ]);
    }
}
