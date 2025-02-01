<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => $this->faker->unique()->numberBetween(1, 999),
            'driver' => $this->faker->name(),
            'model' => $this->faker->word(),
            'team' => $this->faker->word(),
            'color' => $this->faker->colorName(),
        ];
    }
}
