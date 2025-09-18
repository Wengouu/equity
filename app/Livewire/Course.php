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

    public function enroll($courseId)
    {
        $course_user = new Cours_user();

        //on vérifie que l'utilisateur est authentifié
        if(!auth()->check()) {
            session()->flash('error', 'You must be logged in to enroll in a course.');
            return;
        }

        //vérifie si l'utilisateur est déjà inscrit
        if(auth()->user()->isUserEnrolledInCourse($courseId)) {
            session()->flash('error', 'You are already enrolled in this course.');
            return;
        }

        //on l'inscrit au cours
        try {
            $course_user->enrollUserCourse($courseId);
        } catch (\Exception $e) {
            // Gérer l'exception si nécessaire
            Log::error('Error enrolling user in course: '.$e->getMessage());
            session()->flash('error', 'An error occurred. Please try again.');
            return;
        }

        return session()->flash('success', 'You have successfully enrolled in the course!');
    }

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
