@props(['cours'])

<x-card title="{{ $cours->titre }}" class="relative flex flex-col h-full rounded-xl">

    @if($cours->image)
    <img src="{{ asset('storage/' . $cours->image) }}" alt="{{ $cours->titre }}"
        class="absolute inset-0 w-full h-full object-cover opacity-10 blur-0">
    @endif

    <div class="relative z-30">
        <div>
            <x-slot name="title" class="font-extrabold text-lg">{{ $cours->titre }}</x-slot>

            <!-- Contenu principal -->
            <div>
                <p class="mb-4">{{ $cours->description }}</p>
            </div>

            <!-- infos sup -->
            <div class="flex gap-x-2 mb-4">
                @if($cours->total_time > 0)
                <p class="text-gray-600 text-sm">Duration: <span class="font-semibold">{{ $cours->total_time }}
                        min.</span></p>
                @endif
                @if($cours->modules_count > 0)
                <p class="text-gray-600 text-sm">Modules: <span class="font-semibold">{{ $cours->modules_count
                        }}</span></p>
                @endif
            </div>
        </div>

        <!-- Bouton collé en bas -->
        <div class="mt-auto">
            <x-button primary href="{{ route('course.detail', $cours->slug) }}">
                Begin the course
            </x-button>
        </div>
    </div>

</x-card>