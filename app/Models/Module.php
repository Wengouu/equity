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
