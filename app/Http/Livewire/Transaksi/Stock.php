<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Attributes\Title;
use Livewire\Component;

class Stock extends Component
{
    #[Title('Data Stock')]
    public function render()
    {
        return view('livewire.transaksi.stock');
    }
}
