<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $table = 'cours';

    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'cours_users');
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
