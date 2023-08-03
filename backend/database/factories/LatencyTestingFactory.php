<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LatencyTesting>
 */
class LatencyTestingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'alive' => fake()->boolean(),
            'time' => fake()->randomFloat(2, 1, 30),
            'system_id' => fake()->numberBetween(1, 4)
        ];
    }
}
