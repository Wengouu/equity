<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Module;
use App\Models\Video;
use App\Models\Cours;

class ModuleLivewire extends Component
{
    public string $course_slug;
    public string $module_slug;

    public Module $module;
    public Video $video;
    public Cours $cours;

    public function mount()
    {
        $this->cours = new Cours();
        $this->video = new Video();
        $this->module = new Module();

        //on récupère le cours actuel
        $this->cours = $this->cours->getUnCour($this->course_slug);

        //le cours n'existe pas, on affiche une erreur 404
        if(!$this->cours) abort(404);

        //on vérifie si l'utilisateur est inscrit au cours du module
        if (!auth()->user()->isUserEnrolledInCourse($this->cours->id)) {
            return redirect()->route('course.detail', ['slug' => $this->course_slug])
            ->with('error', 'You must be enrolled in the course to access this module.');
        }

        //on recupère le module actuel
        $this->module = $this->module->getUnModule($this->module_slug);

        //le module n'existe pas, on affiche une erreur 404
        if(!$this->module) abort(404);

        //on recupère la vidéo et ses détails du module actuel
        $this->video = $this->video->getVideoModule($this->module->id);
    }

    public function render()
    {
        return view('livewire.module-livewire');
    }
}
