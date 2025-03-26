<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Exercise;
use Carbon\Carbon;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();

        $exercises = [
            [
                'name' => 'Push-Up',
                'description' => 'A basic bodyweight exercise for chest and arms',
                'type' => 'upper body',
                'instructions' => 'Begin in plank position with hands shoulder width apart, lower body down to near floor and push back-up',
                'calories_per_hour' => 400,
                'intensity' => 'medium',
            ],
            [
                'name' => 'Sit-Up',
                'description' => 'A basic exercise for strengthening chest muscles',
                'type' => 'core',
                'instructions' => 'Begin by lying down and bending knees upwards, lift your head and chest up to knees and slowly lower back down to start position',
                'calories_per_hour' => 600,
                'intensity' => 'medium',
            ],
            [
                'name' => 'Squats',
                'description' => 'A lower-body strength exercise focusing on legs',
                'type' => 'lower body',
                'instructions' => 'Place feet shoulder-width apart, bend your knees and hips as if sitting while keeping your back staright and your arms outstretched and then return to start position',
                'calories_per_hour' => 350,
                'intensity' => 'medium',
            ],
            [
                'name' => 'Burpees',
                'description' => 'A full-body exercise that combines a squat, plank, push-up, and jump',
                'type' => 'full body',
                'instructions' => 'Start standing and squat, kick feet back into push-up position and push-up once, jump feet forward and return to standing position',
                'calories_per_hour' => 800,
                'intensity' => 'high',
            ],
            [
                'name' => 'Plank',
                'description' => 'A core strength exercise that improves stability.',
                'type' => 'core',
                'instructions' => 'Lower yourself into push-up position and hold body in position for desired time',
                'calories_per_hour' => 250,
                'intensity' => 'low',
            ],
            [
                'name' => 'Star Jumps',
                'description' => 'A full-body cardiovascular exercise that improves agility and coordination.',
                'type' => 'full body',
                'instructions' => 'Start standing, jump your feet out while raising arms overhead, then jump back to the starting position and repeat.',
                'calories_per_hour' => 400,
                'intensity' => 'high',
            ],
            [
                'name' => 'Lunges',
                'description' => 'A lower body exercise that targets the legs and glutes.',
                'type' => 'lower body',
                'instructions' => 'Step one foot forward, lower hips until both knees are bent at 90 degrees, then return to standing position and repeat on the other side.',
                'calories_per_hour' => 350,
                'intensity' => 'medium',
            ],
            [
                'name' => 'Skipping',
                'description' => 'An exercise that improves cardiovascular health, coordination, and endurance. (Skipping Rope Required)',
                'type' => 'cardio',
                'instructions' => 'Jump over the rope as it swings under your feet, maintaining a steady rhythm and engaging your core.',
                'calories_per_hour' => 700,
                'intensity' => 'high',
            ],
            [
                'name' => 'Yoga',
                'description' => 'A practice that combines breathing, strength, and flexibility through a series of movements. (Mat Required)',
                'type' => 'flexibility',
                'instructions' => 'Perform a sequence of poses while focusing on controlled breathing and maintaining proper form throughout. It is recommended yoga is performed on mat and barefoot',
                'calories_per_hour' => 200,
                'intensity' => 'low to medium',
            ],
            [
                'name' => 'Spot Jogging',
                'description' => 'A simple exercise which strengthen legs, core and breathing',
                'type' => 'cardio',
                'instructions' => 'Pick a spot which you will not move from and at your own pace jog in that spot using correct technique',
                'calories_per_hour' => 450,
                'intensity' => 'medium',
            ],
        ];

        foreach ($exercises as $exercise) {
            Exercise::create(array_merge($exercise, [
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ]));
        }
    }
}

