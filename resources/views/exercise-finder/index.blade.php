<!-- This is the exercise finder page -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-blue-700 leading-tight">
            {{ __('Exercise Finder') }}
        </h2>
        <!-- Success message component -->
        <x-alert-success>
            {{ session('success') }}
        </x-alert-success>
    </x-slot>


    <div class="bg-blue-100 min-h-screen py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-blue-700">

                    <form action="{{ route('exercise-finder.recommend') }}" method="POST" class="mb-8">
                        @csrf
                        <h3 class="font-semibold text-lg mb-4">Find Your Ideal Exercise</h3>

                        <!-- Intensity Selection -->
                        <div class="mb-4">
                            <label for="intensity" class="block text-md text-neutral-900 font-medium">Intensity</label>
                            <select name="intensity" id="intensity" class="form-select mt-1 text-blue-700 block w-full" required>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>

                        <!-- Type Selection -->
                        <div class="mb-4">
                            <label for="type" class="block text-md text-neutral-900 font-medium">Type</label>
                            <select name="type" id="type" class="form-select mt-1 text-blue-700 block w-full" required>
                                <option value="cardio">Cardio</option>
                                <option value="core">Core</option>
                                <option value="flexibility">Flexibility</option>
                                <option value="full body">Full Body</option>
                                <option value="upper body">Upper Body</option>
                                <option value="lower body">Lower Body</option>
                                </select>
                            </div>

                        <!-- Calories Selection -->
                        <div class="mb-4">
                            <label for="calories" class="block text-md text-neutral-900 font-medium">Maximum Calories per Hour</label>
                            <select name="calories" id="calories" class="form-select mt-1 text-blue-700 block w-full" required>
                                <option value="200">200 cal</option>
                                <option value="250">250 cal</option>
                                <option value="300">300 cal</option>
                                <option value="350">350 cal</option>
                                <option value="400">400 cal</option>
                                <option value="450">450 cal</option>
                                <option value="500">500 cal</option>
                                <option value="550">550 cal</option>
                                <option value="600">600 cal</option>
                                <option value="650">650 cal</option>
                                <option value="700">700 cal</option>
                                <option value="750">750 cal</option>
                                <option value="800">800 cal</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Find Exercises
                        </button>
                    </form>

                    <!-- Displaying recommended exercises -->
                    @if (isset($exercises) && count($exercises) > 0)
                        <h3 class="font-semibold text-lg mt-8 mb-4">Recommended Exercises</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($exercises as $exercise)
                        <div class="bg-white border text-neutral-900 rounded-lg shadow-sm p-4">
                        <h4 class="font-semibold text-xl">{{ $exercise->name }}</h4> <br>
                        <p><strong>Description:</strong>{{ $exercise->description }}</p> <br>
                        <p><strong>Instructions:</strong>{{ $exercise->Instructions }}</p> <br>
                        <p><strong>Calories:</strong>{{ $exercise->calories_per_hour }}</p> <br>
                            </div>
                    @endforeach
                        </div>
                    @else
                <!-- Message when no exercises are found -->
                    <p class="mt-6 text-gray-600">No exercises found for the selected criteria. Please try again with different options.</p>
                @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
