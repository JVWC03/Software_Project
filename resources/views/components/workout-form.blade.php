@props(['action', 'method' => 'POST', 'workout' => null])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- Exercise -->
    <div class="mb-4">
        <label for="exercise_id" class="block text-sm font-medium text-gray-700">Exercise</label>
        <select name="exercise_id" id="exercise_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @foreach(\App\Models\Exercise::all() as $exercise)
                <option value="{{ $exercise->id }}" {{ old('exercise_id', $workout->exercise_id ?? '') == $exercise->id ? 'selected' : '' }}>
                    {{ $exercise->name }}
                </option>
            @endforeach
        </select>
        @error('exercise_id')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Intensity -->
    <div class="mb-4">
        <label for="intensity" class="block text-sm text-gray-700">Intensity</label>
        <select
            name="intensity"
            id="intensity"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            <option value="low" {{ old('intensity', $exercise->intensity ?? '') == 'low' ? 'selected' : '' }}>Low</option>
            <option value="medium" {{ old('intensity', $exercise->intensity ?? '') == 'medium' ? 'selected' : '' }}>Medium</option>
            <option value="high" {{ old('intensity', $exercise->intensity ?? '') == 'high' ? 'selected' : '' }}>High</option>
        </select>
        @error('intensity')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Type -->
    <div class="mb-4">
        <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
        <input
            type="text"
            name="type"
            id="type"
            value="{{ old('type', $workout->type ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('type')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Calories -->
    <div class="mb-4">
        <label for="calories" class="block text-sm font-medium text-gray-700">Calories Burned</label>
        <input
            type="number"
            name="calories"
            id="calories"
            value="{{ old('calories', $workout->calories ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('calories')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Duration -->
    <div class="mb-4">
        <label for="duration" class="block text-sm font-medium text-gray-700">Duration (minutes)</label>
        <input
            type="number"
            name="duration"
            id="duration"
            value="{{ old('duration', $workout->duration ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('duration')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Date -->
    <div class="mb-4">
        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
        <input
            type="date"
            name="date"
            id="date"
            value="{{ old('date', $workout->date ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('date')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Submit Button -->
    <x-primary-button>
        {{ isset($workout) ? 'Update Workout' : 'Save Workout' }}
    </x-primary-button>
</form>
