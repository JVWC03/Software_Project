<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-blue-700 leading-tight">
            {{ __('Welcome to QuickFit') }}
        </h2>
        <!-- Success message component -->
        <x-alert-success>
            {{ session('success') }}
        </x-alert-success>
    </x-slot>

    <div class="bg-blue-100 min-h-screen py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-blue-600">
                    <h3 class="font-semibold text-lg mb-4">Your Workouts:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                        @foreach($workouts as $workout)
                        <div>
                            <x-workout-card
                            :workout="$workout"
                            />

                        <div class="mt-4 flex space-x-2">
                        <!-- Edit Button -->
                        <a href="{{ route('workouts.edit', $workout) }}"
                        class="text-neutral-900 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                        Edit
                        </a>

                        <!-- Delete Button - Confirms before deleting -->
                        <form action="{{ route('workouts.destroy', $workout) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this workout?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-neutral-900 font-bold py-2 px-4 rounded">
                            Delete
                            </button>
                        </form>
                    </div>
                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

