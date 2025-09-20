<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Cours;

class ListeCourses extends Component
{
    private $cours;

    public function mount()
    {
        $this->cours = new Cours();

        //on récupère tous les cours
        $this->cours = $this->cours->getCoursPublie();
    }

    public function render()
    {
        return view('livewire.liste-courses', [
            'cours' => $this->cours
        ]);
    }
}
