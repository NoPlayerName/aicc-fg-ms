<?php

namespace App\Http\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Topbar extends Component
{
    public $user;
    // public $profile;

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        redirect()->route('login');
    }

    public function mount()
    {
        $this->user = auth()->user()->profile_object;
    }

    public function render()
    {
        return view('livewire.components.topbar');
    }
}
