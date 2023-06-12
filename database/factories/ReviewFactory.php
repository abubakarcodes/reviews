<?php

namespace Database\Factories;

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
            'manager' => $this->faker->name(),
            'group1' => $this->faker->colorName(),
            'group2' => $this->faker->colorName(),
            'group3' => $this->faker->colorName(),
            'city1' => $this->faker->city(),
            'city2' => $this->faker->city(),
            'city3' => $this->faker->city(),
            'review' => $this->faker->paragraph(),
            'discussion' => $this->faker->paragraph(),
            'response' => $this->faker->paragraph(),
            'communication' => random_int(1, 10),
            'professionalism' => random_int(1, 10),
            'expertise' => random_int(1, 10),
            'overall' => random_int(1, 10),
            'isApproved' => true,
        ];
    }
}
