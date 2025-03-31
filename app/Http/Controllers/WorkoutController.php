<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $workouts = Workout::all();
    return view('workouts.index', compact('workouts'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('workouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'exercise_id' => 'required|exists:exercises,id',
        'intensity' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'calories' => 'required|integer',
        'duration' => 'required|integer',
        'date' => 'required|date',
    ]);

    Workout::create([
        'user_id' => auth()->id(),
        'exercise_id' => $request->exercise_id,
        'intensity' => $request->intensity,
        'type' => $request->type,
        'calories' => $request->calories,
        'duration' => $request->duration,
        'date' => $request->date,
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Workout $workout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workout $workout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Workout $workout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workout $workout)
    {
        //
    }
}
