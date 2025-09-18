<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    protected $guarded = ['id'];

    //on récupère les vidéos d'un module
    public function getVideoModule($moduleId)
    {
        return $this->where('module_id', $moduleId)
                    ->where('publie', true)
                    ->first();
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
