<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Your Workouts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Create a New Workout:</h3>

                    <!-- blade workout form -->
                    <x-workout-form
                        :action="route('workouts.store')"
                        :method="'POST'"
                        />

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
