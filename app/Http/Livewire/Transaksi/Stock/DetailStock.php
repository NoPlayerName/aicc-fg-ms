<?php

namespace App\Http\Livewire\Transaksi\Stock;

use Livewire\Attributes\On;
use Livewire\Component;

class DetailStock extends Component
{
   
    public $id;
    #[On('show-detail')]
    public function open($id)
    {
        $this->id = $id;
    }
    public function mount()
    {
        
    }
    public function render()
    {
        return view('livewire.transaksi.stock.detail-stock');
    }
}
