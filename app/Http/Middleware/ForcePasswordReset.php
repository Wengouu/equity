<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ForcePasswordReset
{
    public function handle($request, Closure $next)
    {
        if ($request->routeIs('password.reset.first') || $request->routeIs('livewire.update')) {
            return $next($request);
        }

        if (session('must_reset_password')) {
            return redirect()->route('password.reset.first');
        }

        return $next($request);
    }
}