<?php

namespace Database\Seeders;

use App\Models\v1\Review;
use Database\Factories\ReviewFactory;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::withoutEvents(function ()  {        
            // normally
            Review::factory()
            ->count(1000)
            ->create();
        });
    }
}
