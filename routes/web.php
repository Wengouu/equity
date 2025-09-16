<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')
->middleware(['auth'])
->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::view('cours', 'cours')
    ->middleware(['auth'])
    ->name('cours');

//Détail d'un cours
Route::view('cours/{slug}', 'cours.show')
    ->where('slug', '^[a-z0-9-]+$')
    ->middleware(['auth'])
    ->name('cours.show');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
