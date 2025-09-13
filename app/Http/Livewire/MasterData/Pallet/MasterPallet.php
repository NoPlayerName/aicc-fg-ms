<?php

namespace App\Http\Livewire\MasterData\Pallet;

use Livewire\Attributes\On;
use Livewire\Component;

class MasterPallet extends Component
{
    public function deleteConfirm($id){
        $this->dispatch('delete-confirm', id : $id);
        
    }
  
    public function delete($id)
    {
        dd($id);
        // kirim event feedback ke frontend
        // $this->dispatch('deleted');
    }
    public function render()
    {
        return view('livewire.master-data.pallet.master-pallet');
    }
}
