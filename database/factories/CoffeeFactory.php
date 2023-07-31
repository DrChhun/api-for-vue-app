<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coffee>
 */
class CoffeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->name(),
            "price" => $this->faker->numberBetween(1, 50),
            "available" => $this->faker->numberBetween(1, 100),
            "sold" => $this->faker->numberBetween(1, 50)
        ];
    }
}
