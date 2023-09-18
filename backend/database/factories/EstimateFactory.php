<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EstimateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->text(),
            'total_time' => $this->faker->randomFloat(1)
        ];
    }
}
