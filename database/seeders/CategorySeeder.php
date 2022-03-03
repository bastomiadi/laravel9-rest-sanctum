<?php

namespace Database\Seeders;

use App\Models\v1\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::withoutEvents(function ()  {        
            // normally
            Category::factory()
            ->count(100)
            ->create();
        });
    }
}
