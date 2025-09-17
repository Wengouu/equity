<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Cours;
use App\Models\Module;

class Course extends Component
{
    public string $slug;

    public function render()
    {
        $cours = new Cours();
        $modules = new Module();

        $cours = $cours->getUnCour($this->slug);

        $modules = $modules->getModulesCours($cours->id);
        
        $isEnrolled = auth()->user()->isUserEnrolledInCourse($cours->id);

        //le cours n'existe pas
        if(!$cours) abort(404);

        return view('livewire.course', [
            'cours' => $cours,
            'modules' => $modules,
            'isEnrolled' => $isEnrolled,
        ]);
    }
}
