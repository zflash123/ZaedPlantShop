<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductCategorySeeder::class);
        if (app()->isLocal()) {
            $this->call(UserSeeder::class);
            $this->call(ProductSeeder::class);
            $this->call(OrderSeeder::class);
            $this->call(CartSeeder::class);
        }
    }
}
