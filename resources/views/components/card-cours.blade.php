@props(['cours'])

<x-card title="{{ $cours->titre }}" rounded="lg" class="flex flex-col h-full">

    <div>
        <x-slot name="title" class="font-bold text-lg">{{ $cours->titre }}</x-slot>

        <!-- Contenu principal -->
        <div>
            <p class="mb-4">{{ $cours->description }}</p>
        </div>
    </div>

    <!-- Bouton collé en bas -->
    <div class="mt-auto">
        <x-button primary href="{{ route('course.detail', $cours->slug) }}">
            Begin the course
        </x-button>
    </div>

</x-card>