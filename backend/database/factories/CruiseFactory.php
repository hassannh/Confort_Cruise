<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cruise>
 */
class CruiseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'price' => fake()->randomNumber(),
            'picture' => fake()->imageUrl(),
            'nights_number' => fake()->randomNumber(),
            'start_date' => fake()->date(),
            'ports' => fake()->text(),
            
        ];
    }
}
