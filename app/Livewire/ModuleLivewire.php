<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Module;
use App\Models\Video;
use App\Models\Cours;
use App\Models\Modules_user;

class ModuleLivewire extends Component
{
    public string $course_slug;
    public string $module_slug;

    public $previousModule;
    public $nextModule;

    public $module;
    public $video;
    public $cours;

    private $modules_user;

    public function mount()
    {
        //on vérifie si l'utilisateur est authentifié
        if(!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access a module.');
        }
    }

    public function completeModule($courseId, $moduleId, $courseSlug, $nextModuleSlug)
    {
        $modules_user = new Modules_user();

        //vérifie si l'utilisateur n'a pas déjà complété le module du cours
        if(!auth()->user()->hasUserCompletedModule($courseId, $moduleId)) 
        {
            //on le marque comme complété
            try {
                $modules_user->completeModule($courseId, $moduleId);
            } catch (\Exception $e) {
                // Gérer l'exception si nécessaire
                Log::error('Error completing module: '.$e->getMessage());
                return redirect()->back()->with('error', 'An error occurred. Please try again.');
            }
        }

        return redirect()->route('module.detail', [$courseSlug, $nextModuleSlug])->with('success', 'You have successfully completed the previous module!');
    }

    public function render()
    {
        $this->cours = new Cours();
        $this->video = new Video();
        $this->module = new Module();

        //on récupère le cours actuel
        $this->cours = $this->cours->getUnCour($this->course_slug);

        //le cours n'existe pas, on affiche une erreur 404
        if(!$this->cours) abort(404);

        //on recupère le module actuel
        $this->module = $this->module->getUnModule($this->module_slug);

        //on récupère le module précédent
        $this->previousModule = $this->module->getModulePrecedent($this->cours->id, $this->module->id);

        //on récupère le module suivant
        $this->nextModule = $this->module->getModuleSuivant($this->cours->id, $this->module->id);

        //le module n'existe pas, on affiche une erreur 404
        if(!$this->module) abort(404);

        //on vérifie si l'utilisateur est inscrit au cours du module
        if ($this->module->publie && !auth()->user()->isUserEnrolledInCourse($this->cours->id)) {
            return redirect()->route('course.detail', ['slug' => $this->course_slug])
            ->with('error', 'You must be enrolled in the course to access this module.');
        }

        //on recupère la vidéo et ses détails du module actuel
        $this->video = $this->module->videos()->first();

        return view('livewire.module-livewire');
    }
}
