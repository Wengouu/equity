<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Cours;

class CoursesUser extends Component
{
    public $courses;

    public function mount()
    {
        //on recupère les cours où l'utilisateur est inscrit
        $this->courses = auth()->user()->cours()->get();
    }

    public function render()
    {
        return view('livewire.courses-user');
    }
}
