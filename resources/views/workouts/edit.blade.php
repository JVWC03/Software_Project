<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Workout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Edit Your Workout:</h3>

                    <!-- Reuse workout form component -->
                    <x-workout-form
                        :action="route('workouts.update', $workout)"
                        :method="'PUT'"
                        :workout="$workout"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
