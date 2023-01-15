<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'user_id' => 2,
            'product_id' => 3,
            'total_ordered' => 4,
        ]);
        Order::create([
            'user_id' => 1,
            'product_id' => 1,
            'total_ordered' => 2,
        ]);
    }
}
