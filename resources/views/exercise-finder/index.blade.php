<!-- This is the exercise finder page -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Exercise Finder') }}
        </h2>
        <!-- Success message component -->
        <x-alert-success>
            {{ session('success') }}
        </x-alert-success>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('exercise-finder.recommend') }}" method="POST" class="mb-8">
                        @csrf
                        <h3 class="font-semibold text-lg mb-4">Find Your Ideal Exercise</h3>

                        <!-- Intensity Selection -->
                        <div class="mb-4">
                            <label for="intensity" class="block text-lg font-medium">Intensity</label>
                            <select name="intensity" id="intensity" class="form-select mt-1 block w-full" required>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>

                        <!-- Type Selection -->
                        <div class="mb-4">
                            <label for="type" class="block text-lg font-medium">Type</label>
                            <select name="type" id="type" class="form-select mt-1 block w-full" required>
                                <option value="cardio">Cardio</option>
                                <option value="core">Core</option>
                                <option value="flexibility">Flexibility</option>
                                <option value="full body">Full Body</option>
                                <option value="upper body">Upper Body</option>
                                <option value="lower body">Lower Body</option>
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
                        <div class="bg-white border rounded-lg shadow-sm p-4">
                        <h4 class="font-semibold text-xl">{{ $exercise->name }}</h4> <br>
                        <p><strong>Description:</strong>{{ $exercise->description }}</p> <br>
                        <p><strong>Calories:</strong>{{ $exercise->calories_per_hour }}</p> <br>
                        <p><strong>Intensity:</strong> {{ ($exercise->intensity) }}</p> <br>
                        <p><strong>Type:</strong> {{ ($exercise->type) }}</p>
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
