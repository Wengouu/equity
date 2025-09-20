@props(['cours'])

<x-card title="{{ $cours->titre }}" rounded="base">
    <x-slot name="title" class="font-bold text-lg">{{ $cours->titre }}</x-slot>
    <p class="mb-4">{{ $cours->description }}</p>
    <x-button primary href="{{ route('course.detail', $cours->slug) }}">Begin the course</x-button>
</x-card>