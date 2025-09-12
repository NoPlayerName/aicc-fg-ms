<?php

namespace App\Http\Livewire\Pallet;

use Livewire\Component;

class PalletData extends Component
{
    
    public function showDetail($id)
    {
        // dd($id);
        $this->dispatch('show-detail', id: $id);
    }
    public function render()
    {
        return view('livewire.pallet.pallet-data');
    }
}
