<?php

namespace Database\Factories\v1;

use App\Models\User;
use App\Models\v1\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->word(),
            'detail' => $this->faker->paragraph(),
            'category_id' => Category::inRandomOrder()->value('id'),
            'price' => $this->faker->numberBetween(100,1000),
            'stock' => $this->faker->randomDigit(),
            'discount' => $this->faker->numberBetween(2,30),
            'created_by' => User::inRandomOrder()->value('id')
        ];
    }
}
