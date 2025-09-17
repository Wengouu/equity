<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $table = 'cours';

    protected $guarded = ['id'];

    //on recupère tous les cours publiés
    public function getCoursPublie()
    {
        return $this->all()->where('publie', 1);
    }

    //on recupère tous les cours d'un utilisateur
    public function getCoursUtilisateur()
    {
        return $this->users()->where('user_id', auth()->user()->id)->get();
    }

    //on recupère un cours
    public function getUnCour($slug)
    {
        return $this->where('slug', $slug)->first();
    }


    public function users()
    {
        return $this->belongsToMany(User::class, 'cours_users');
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
