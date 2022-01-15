<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostalCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->numerify('#####'),
        ];
    }
}
