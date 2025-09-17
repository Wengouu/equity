<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';

    protected $guarded = ['id'];

    //on récupère les modules d'un cours
    public function getModulesCours($cours_id)
    {
        return $this->where('cours_id', $cours_id)
                    ->orderBy('id', 'asc')
                    ->get();
    }

    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
