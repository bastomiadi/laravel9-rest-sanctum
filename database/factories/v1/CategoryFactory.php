<?php

namespace Database\Factories\v1;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_name' => $this->faker->word(),
            'detail' => $this->faker->paragraph(),
            'created_by' => User::inRandomOrder()->value('id')
        ];
    }
}
