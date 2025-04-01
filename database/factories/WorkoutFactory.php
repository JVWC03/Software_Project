<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Exercise;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Workout>
 */
class WorkoutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'exercise_id' => Exercise::inRandomOrder()->first()->id,
            'intensity' => $this->faker->randomElement(['Low', 'Medium', 'High']),
            'type' => $this->faker->randomElement(['Cardio', 'Strength', 'Flexibility', 'Balance']),
            'number' => $this->faker->numberBetween(1, 5),
            'calories' => $this->faker->numberBetween(100, 800),
            'duration' => $this->faker->numberBetween(15, 120),
            'date' => $this->faker->date(),
            'notes' => $this->faker->text(100),
        ];
    }
}
