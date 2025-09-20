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

    //les utilisateurs qui sont inscrits à au moins un cours
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //les cours où au moins un utilisateur est inscrit
    public function course()
    {
        return $this->belongsTo(Cours::class, 'cours_id');
    }
}
