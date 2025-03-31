<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Workout;

class DashboardController extends Controller
{
    public function index()
    {
        $workouts = Workout::all();
        return view('dashboard', compact('workouts'));
    }
}
