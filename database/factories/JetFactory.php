<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jet>
 */
class JetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'model' => $this->faker->word(),
            'capacity' => $this->faker->numberBetween(5, 100),
            'hourly_rate' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
