<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Home;
use App\Livewire\Course;
use App\Livewire\ModuleLivewire;

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


Route::view('courses', ListeCourses::class)
    ->middleware(['auth'])
    ->name('courses.list');

//tableau de bord
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
