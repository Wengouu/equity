<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';

    protected $guarded = ['id'];

    //on récupère un module par son slug
    public function getUnModule($slug)
    {
        return $this->where('slug', $slug)->first();
    }

    public function getModulePrecedent($coursId, $moduleId)
    {
        return $this->where('cours_id', $coursId)
            ->where('id', '<',  $moduleId)
            ->first();
    }

    public function getModuleSuivant($coursId, $moduleId)
    {
        return $this->where('cours_id', $coursId)
            ->where('id', '>',  $moduleId)
            ->first();
    }

    //le cours qui possède le module
    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }

    //les vidéos que possède le module
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
