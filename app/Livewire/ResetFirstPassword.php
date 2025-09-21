<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetFirstPassword extends Component
{
    public $user;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $this->user = Auth::user();

        // // Si l'utilisateur n'existe pas ou ne doit pas reset son mot de passe, rediriger
        if (!$this->user || !$this->user->must_reset_password) {
            return redirect()->route('login');
        }
    }

    public function save()
    {
        $this->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        if($this->password !== $this->password_confirmation) {
            $this->addError('password_confirmation', 'The password confirmation does not match.');
            return;
        }

        $this->user->password = Hash::make($this->password);
        $this->user->must_reset_password = false;
        $this->user->save();

        session()->flash('success', 'Password changed successfully!');
        session()->forget('must_reset_password');

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.reset-first-password')->layout('layouts.guest');
    }
}

