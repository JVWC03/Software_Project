<?php

namespace Database\Seeders;

use App\Models\User;
// use App\Models\Exercise;
use App\Models\Workout;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Seed Users - Create 100 users using the factory
        User::factory(100)->create();

        // Seed Workouts - Create 200 workouts using the factory
        Workout::factory(10)->create();

        //$this->call([
        //    ExerciseSeeder::class,
        //]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
