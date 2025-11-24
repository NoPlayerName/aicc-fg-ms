<?php

namespace App\Http\Livewire\DataStock;

use App\Http\Livewire\BaseLivewireComponent;

class DataStock extends BaseLivewireComponent
{
        public function mount()
    {
        $this->mountBase();
        if (!$this->can('can_access')) {
            session()->flash('no_permission', 'You no Have Permission');
            return redirect()->route('dashboard');
        }
    }
    public function render()
    {
        return view('livewire.data-stock.data-stock');
    }
}
