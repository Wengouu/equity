<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    protected $guarded = ['id'];

    //le module auquel appartient la vidéo
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
