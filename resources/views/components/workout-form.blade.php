@props(['action', 'method' => 'POST', 'workout' => null])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <!-- Exercise -->
    <div class="mb-4">
        <label for="exercise_id" class="block text-md font-medium text-neutral-900">Exercise</label>
        <select name="exercise_id" id="exercise_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @foreach(\App\Models\Exercise::all() as $exercise)
                <option value="{{ $exercise->id }}" {{ old('exercise_id', $workout->exercise_id ?? '') == $exercise->id ? 'selected' : '' }}>
                    {{ $exercise->name }}
                </option>
            @endforeach
        </select>
        @error('exercise_id')
            <p class="text-md text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Intensity -->
    <div class="mb-4">
        <label for="intensity" class="block text-md text-neutral-900">Intensity</label>
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
            <p class="text-md text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Type -->
    <div class="mb-4">
        <label for="type" class="block text-md font-medium text-neutral-900">Type</label>
        <input
            type="text"
            name="type"
            id="type"
            value="{{ old('type', $workout->type ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('type')
            <p class="text-md text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Number -->
    <div class="mb-4">
        <label for="number" class="block text-md font-medium text-neutral-900">Number Completed</label>
        <input
            type="number"
            name="number"
            id="number"
            value="{{ old('number', $workout->number ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('number')
            <p class="text-md text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Calories -->
    <div class="mb-4">
        <label for="calories" class="block text-md font-medium text-neutral-900">Calories Burned</label>
        <input
            type="number"
            name="calories"
            id="calories"
            value="{{ old('calories', $workout->calories ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('calories')
            <p class="text-md text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Duration -->
    <div class="mb-4">
        <label for="duration" class="block text-md font-medium text-neutral-900">Duration (minutes)</label>
        <input
            type="number"
            name="duration"
            id="duration"
            value="{{ old('duration', $workout->duration ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('duration')
            <p class="text-md text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Date -->
    <div class="mb-4">
        <label for="date" class="block text-md font-medium text-neutral-900">Date</label>
        <input
            type="date"
            name="date"
            id="date"
            value="{{ old('date', $workout->date ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('date')
            <p class="text-md text-red-600">{{ $message }}</p>
        @enderror
    </div>

     <!-- Notes -->
     <div class="mb-4">
        <label for="notes" class="block text-md font-medium text-neutral-900 mt-4">Notes</label>
    <textarea name="notes" id="notes" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('notes', $workout->notes ?? '') }}</textarea>
        @error('notes')
            <p class="text-red-500 text-md">{{ $message }}</p>
        @enderror
        </div>

    <!-- Submit Button -->
    <x-primary-button class="bg-green-500 hover:bg-green-700 text-white font-bold">
        {{ isset($workout) ? 'Update Workout' : 'Save Workout' }}
    </x-primary-button>
</form>
