<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseFinderController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/exercise-finder', [ExerciseFinderController::class, 'index'])->name('exercise-finder.index');
Route::post('/exercise-finder', [ExerciseFinderController::class, 'store'])->name('exercise.store');
Route::post('/exercise-finder/recommend', [ExerciseFinderController::class, 'recommend'])->name('exercise-finder.recommend');

Route::get('/workouts', [WorkoutController::class, 'index'])->name('workouts.index');
Route::get('/workouts/create', [WorkoutController::class, 'create'])->name('workouts.create');
Route::post('/workouts', [WorkoutController::class, 'store'])->name('workouts.store');

Route::get('/workouts/{workout}/edit', [WorkoutController::class, 'edit'])->name('workouts.edit');
Route::put('/workouts/{workout}', [WorkoutController::class, 'update'])->name('workouts.update');
Route::delete('/workouts/{workout}', [WorkoutController::class, 'destroy'])->name('workouts.destroy');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

require __DIR__.'/auth.php';
