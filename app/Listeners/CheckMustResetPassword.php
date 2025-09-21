<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;

class CheckMustResetPassword
{
    public function handle(Login $event)
    {
        $user = $event->user;

        // Si l'utilisateur doit reset son mot de passe
        if ($user->must_reset_password) {
            session(['must_reset_password' => true]);
            return redirect()->route('password.reset.first');
        }
    }
}