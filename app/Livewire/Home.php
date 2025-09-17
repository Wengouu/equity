<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Cours;

class Home extends Component
{
    public function render()
    {
       $cours = new Cours();

        return view('livewire.home', [
            'cours' => $cours->getCoursPublie(),
        ]);
    }
}
