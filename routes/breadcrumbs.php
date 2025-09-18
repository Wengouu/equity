<?php

use Illuminate\Http\Request;
use WireUi\Breadcrumbs\Breadcrumbs;
use WireUi\Breadcrumbs\Trail;

use App\Models\Cours;

// Fil d’Ariane pour la page d’accueil
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Homepage', route('home'));
});

// Fil d’Ariane pour la liste des cours
Breadcrumbs::for('courses.list', function ($trail) {
    $trail->parent('home');
    $trail->push('Courses', route('courses.list'));
});

// Fil d’Ariane pour le détail d’un cours
Breadcrumbs::for('course.detail', function ($trail, Cours $cours) {
    $trail->parent('courses.list');
    $trail->push($cours->titre, route('course.detail', $cours));
});
