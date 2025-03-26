<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseFinderController;

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

require __DIR__.'/auth.php';
