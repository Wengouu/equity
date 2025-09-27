<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Home;
use App\Livewire\Course;
use App\Livewire\ModuleLivewire;
use App\Livewire\ListeCourses;
use App\Livewire\CoursesUser;

//accueil
Route::get('/', Home::class)
    ->middleware(['auth'])
    ->name('home');

//Détail d'un cours
Route::get('course/{slug}', Course::class)
    ->where('slug', '^[a-z0-9-]+$')
    ->middleware(['auth'])
    ->name('course.detail');

//Détail d'un module
Route::get('course/{course_slug}/{module_slug}', ModuleLivewire::class)
    ->where('course_slug', '^[a-z0-9-]+$')
    ->where('module_slug', '^[a-z0-9-]+$')
    ->middleware(['auth'])
    ->name('module.detail');

//liste des cours disponibles
Route::get('courses', ListeCourses::class)
    ->middleware(['auth'])
    ->name('courses.list');

//liste des cours dont l'utilisateur est inscrit
Route::get('my-courses', CoursesUser::class)
    ->middleware(['auth'])
    ->name('courses.user');

//tableau de bord
// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
