@props(['action', 'method', 'exercise'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- Exercise Name input fields for adding or updating -->
    <div class="mb-4">
        <label for="name" class="block text-sm text-gray-700">Exercise Name</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $exercise->name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Exercise Description input fields for adding or updating -->
    <div class="mb-4">
        <label for="description" class="block text-sm text-gray-700">Exercise Description</label>
        <textarea
            name="description"
            id="description"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $exercise->description ?? '') }}</textarea>
        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Exercise Intensity input fields for adding or updating -->
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

    <!-- Exercise Duration input fields for adding or updating -->
    <div class="mb-4">
        <label for="duration" class="block text-sm text-gray-700">Duration (in minutes)</label>
        <input
            type="number"
            name="duration"
            id="duration"
            value="{{ old('duration', $exercise->duration ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('duration')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Exercise Image input fields for adding or updating -->
    @isset($exercise->image)
        <div class="mb-4">
            <img src="{{ asset('images/exercises/' . $exercise->image) }}" alt="Exercise image" class="w-24 h-24 object-cover">
        </div>
    @endisset

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Exercise Image (Optional)</label>
        <input
            type="file"
            name="image"
            id="image"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <!-- When clicked, the exercise is added or updated -->
        <x-primary-button>
            {{ isset($exercise) ? 'Update Exercise' : 'Add Exercise' }}
        </x-primary-button>
    </div>
</form>
