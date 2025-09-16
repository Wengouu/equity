<?php

use Livewire\Volt\Component;

use App\Models\Cours;
use Illuminate\Support\Facades\URL;

new class extends Component {

    public function with(): array
    {
        return [
            'cours' => Cours::all()->where('publie', 1),
        ];
    }

}; ?>

<div class="grid md:grid-cols-3 gap-10">
    @foreach ($cours as $coursItem)
    <x-card title="{{ $coursItem->titre }}" rounded="base">
        <x-slot name="title" class="font-bold text-lg">{{ $coursItem->titre }}</x-slot>
        <p class="mb-4">{{ $coursItem->description }}</p>
        <x-button primary href="{{  URL::to('/cours/'.$coursItem->slug) }}">Begin</x-button>
    </x-card>
    @endforeach
</div>