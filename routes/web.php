<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Home;
use App\Livewire\Course;

//accueil
Route::get('/', Home::class)
    ->middleware(['auth'])
    ->name('home');

//Détail d'un cours
Route::get('course/{slug}', Course::class)
    ->where('slug', '^[a-z0-9-]+$')
    ->middleware(['auth'])
    ->name('course.detail');


Route::view('course', 'cours')
    ->middleware(['auth'])
    ->name('cours');

//tableau de bord
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
