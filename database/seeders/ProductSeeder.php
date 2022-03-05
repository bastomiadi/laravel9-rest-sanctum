<?php

namespace Database\Seeders;

use App\Models\v1\Product;
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
        Product::withoutEvents(function ()  {        
            // normally
            Product::factory()
            ->count(2000)
            ->create();
        });
    }
}
