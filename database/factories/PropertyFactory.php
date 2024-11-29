<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3),
            'lat' => fake()->latitude(),
            'lon' => fake()->longitude(),
            'address' => fake()->address(),
            'size' => fake()->numberBetween(75, 500),
            'size_type' => fake()->numberBetween(1,2),
            'type' => fake()->numberBetween(1,2),
            'bedrooms' => fake()->numberBetween(1,6),
            'price' => fake()->numberBetween(2000, 30000),
        ];
    }
}
