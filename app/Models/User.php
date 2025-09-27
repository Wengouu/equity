<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //on vérifie si l'utilisateur est inscrit au cours
    public function isUserEnrolledInCourse($cours_id): bool
    {
        return $this->cours()->where('cours_id', $cours_id)->exists();
    }

    //on vérifie si l'utilisateur a complété le module
    public function hasUserCompletedModule($cours_id, $module_id): bool
    {
        return $this->modules()->where('module_id', $module_id)
        ->where('modules_users.cours_id', $cours_id)
        ->exists();
    }

    //on recupère les id des modules complétés par l'utilisateur pour un cours
    public function getCompletedModulesForCourse($cours_id)
    {
        return $this->modules()
        ->select('modules.id')
        ->where('modules_users.cours_id', $cours_id)->get();
    }

    //les cours où l'utilisateur est inscrit
    public function cours()
    {
        return $this->belongsToMany(Cours::class, 'cours_users', 'user_id', 'cours_id');
    }

    //les modules que l'utilisateur a complétés
    public function modules()
    {
        return $this->belongsToMany(Module::class, 'modules_users', 'user_id', 'module_id');
    }
}
