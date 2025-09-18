<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cours_user extends Model
{
    protected $table = 'cours_users';

    protected $guarded = ['id'];

    //on enregistre l'inscription d'un utilisateur à un cours (auth user)
    public function enrollUserCourse($courseId)
    {
        return $this->create([
            'user_id' => auth()->id(),
            'cours_id' => $courseId,
        ]);
    }
}
