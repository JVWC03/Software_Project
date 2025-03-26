<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseFinderController extends Controller
{
    /**
     * Display the form to get user input.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Show the form without recommended exercises
        return view('exercise-finder.index', ['exercises' => null]);
    }

    /**
     * Handle the exercise recommendation logic.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function recommend(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'intensity' => 'required|string',
            'type' => 'required|string',
        ]);

        // Retrieve the validated data
        $intensity = $request->input('intensity');
        $type = $request->input('type');

        // Fetch exercises based on intensity and duration
        $exercises = Exercise::where('intensity', $intensity)
                             ->where('type', $type)
                             ->get();

        // Return the view and pass the filtered exercises
        return view('exercise-finder.index', compact('exercises'));
    }
}
