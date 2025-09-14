<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';

    protected $guarded = ['id'];

    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
