<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exercise>
 */
class ExerciseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'instructions' => $this->faker->paragraph(),
            'calories_per_hour' => $this->faker->numberBetween(200, 800),
            'intensity' => $this->faker->randomElement(['Low', 'Medium', 'High']),
            'type' => $this->faker->randomElement(['Strength', 'Cardio', 'Flexibility', 'Balance']),
        ];
    }
}
