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

        $cours = $cours->getUnCour($this->slug);

        //le cours n'existe pas
        if(!$cours) abort(404);

        return view('livewire.course', [
            'cours' => $cours,
        ]);
    }
}
