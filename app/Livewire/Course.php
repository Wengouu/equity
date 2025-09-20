<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Cours;
use App\Models\Module;
use App\Models\Cours_user;

use Illuminate\Support\Facades\Log;

class Course extends Component
{
    public string $slug;

    private $cours;
    private $modules;

    public function mount(string $slug)
    {
        $this->slug = $slug;
    }

    public function enroll($courseId)
    {
        $course_user = new Cours_user();

        //on vérifie que l'utilisateur est authentifié
        if(!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to enroll.');
        }

        //vérifie si l'utilisateur est déjà inscrit
        if(auth()->user()->isUserEnrolledInCourse($courseId)) {
            return redirect()->route('course.detail', $courseId)->with('error', 'You are already enrolled.');
        }

        //on l'inscrit au cours
        try {
            $course_user->enrollUserCourse($courseId);
        } catch (\Exception $e) {
            // Gérer l'exception si nécessaire
            Log::error('Error enrolling user in course: '.$e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }

         return redirect()->route('course.detail', $this->slug)->with('success', 'You have successfully enrolled!');
    }

    public function render()
    {
        $this->cours = new Cours();
        $this->modules = new Module();

        //on recup le cours
        $this->cours = $this->cours->getUnCour($this->slug);

        //le cours n'existe pas
        if(!$this->cours) abort(404);

        //on recup les modules du cours
        $this->modules = $this->cours->modules()->get();

        //est-ce que l'utilisateur est inscrit au cours
        $isEnrolled = auth()->user()->isUserEnrolledInCourse($this->cours->id);

        return view('livewire.course', [
            'cours' => $this->cours,
            'modules' => $this->modules,
            'isEnrolled' => $isEnrolled,
        ]);
    }
}
