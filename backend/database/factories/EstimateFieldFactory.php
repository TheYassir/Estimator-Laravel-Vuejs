<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EstimateFieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(15),
            'slug' => $this->faker->slug(2),
            'type' => 'text'
        ];
    }
}
