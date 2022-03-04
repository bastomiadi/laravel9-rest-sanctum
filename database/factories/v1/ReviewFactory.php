<?php

namespace Database\Factories\v1;

use App\Models\User;
use App\Models\v1\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::inRandomOrder()->value('id'),
            'review' => $this->faker->paragraph(),
            'star' => $this->faker->numberBetween(0,5),
            'created_by' => User::inRandomOrder()->value('id')
        ];
    }
}
