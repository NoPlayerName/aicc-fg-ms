<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $user;

    public function mount()
    {
        $this->user = auth()->user()->profile_object;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
