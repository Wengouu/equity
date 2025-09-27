<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modules_user extends Model
{
    protected $table = 'modules_users';
    
    protected $guarded = ['id'];

    //on insert quand l'utilisateur a bien complété le module (clic sur le bouton module suivant)
    public function completeModule($coursId, $moduleId)
    {
        return $this->create([
            'user_id' => auth()->id(),
            'cours_id' => $coursId,
            'module_id' => $moduleId,
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
