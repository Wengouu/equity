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

    //on recupère un cours
    public function getUnCour($slug)
    {
        return $this->where('slug', $slug)->first();
    }

    //on recup les modules publies du cours
    public function getModulesPublies()
    {
        return $this->modules()->where('publie', 1)->get();
    }

    //les modules du cours
    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
