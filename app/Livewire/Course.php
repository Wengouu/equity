<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Cours;

class Course extends Component
{
    public string $slug;

    public function render()
    {
        $cours = new Cours();

        return view('livewire.course', [
            'cours' => $cours->getUnCour($this->slug),
        ]);
    }
}
