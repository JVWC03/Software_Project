@props(['workout'])

<div class="bg-white shadow-md rounded-lg p-4">
    <h3 class="text-lg font-bold">{{ $workout->exercise->name }}</h3>
    <p class="text-sm text-neutral-900 mt-4">Type: {{ $workout->type }}</p>
    <p class="text-sm text-neutral-900 mt-4">Intensity: {{ $workout->intensity }}</p>
    <p class="text-sm text-neutral-900 mt-4">Number Completed: {{ $workout->number }}</p>
    <p class="text-sm text-neutral-900 mt-4">Calories Burned: {{ $workout->calories }}</p>
    <p class="text-sm text-neutral-900 mt-4">Duration: {{ $workout->duration }} mins</p>
    <p class="text-sm text-neutral-900 mt-4">Date: {{ $workout->date }}</p>
    <p class="text-sm text-neutral-900 mt-4">Notes: {{ $workout->notes }}</p>
</div>
