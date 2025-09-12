<?php

namespace App\Http\Livewire\Pallet;

use Livewire\Attributes\On;
use Livewire\Component;

class DetailPallet extends Component
{
      public $id;
       #[On('show-detail')]
    public function open($id)
    {
        $this->id = $id;
    }
    public function exportExccel()
    {
        dd('export');
    }
    public function render()
    {
        return view('livewire.pallet.detail-pallet');
    }
}
