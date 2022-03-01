<?php

namespace Database\Seeders;

use App\Models\v1\Product;
use Database\Factories\ProductFactory;
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
        Product::factory()
        ->count(500)
        ->create();
    }
}
