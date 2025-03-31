<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $workouts = Workout::where('user_id', Auth::id())->get();

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
        'intensity' => 'required|string',
        'type' => 'required|string',
        'number' => 'required|integer',
        'calories' => 'required|integer',
        'duration' => 'required|integer',
        'date' => 'required|date',
        'notes' => 'string|nullable',
    ]);

    Workout::create([
        'user_id' => Auth()->id(),
        'exercise_id' => $request->exercise_id,
        'intensity' => $request->intensity,
        'type' => $request->type,
        'number' => $request->number,
        'calories' => $request->calories,
        'duration' => $request->duration,
        'date' => $request->date,
        'notes' => $request->notes,
    ]);

    return to_route('workouts.index')->with('success', 'Workout created successfully!');
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
