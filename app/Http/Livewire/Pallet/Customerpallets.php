<?php

namespace App\Http\Livewire\Pallet;

use App\Http\Livewire\BaseLivewireComponent;
use Livewire\Component;

class Customerpallets extends BaseLivewireComponent
{

    public function mount()
    {
        $this->mountBase();
        if (!$this->can('can_access')) {
            session()->flash('no_permission', 'You no Have Permission');
            return redirect()->route('dashboard');
        }
    }
    public function showDetail($type, $color, $customer)
    {
        // dd($type, $color, $customer);
        $this->dispatch('show-detail', type: $type, color: $color, customer: $customer);
    }
    public function render()
    {
        return view('livewire.pallet.customer-pallets');
    }
}
