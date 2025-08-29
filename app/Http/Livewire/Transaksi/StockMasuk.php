<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Attributes\Title;
use Livewire\Component;

class StockMasuk extends Component
{
    #[Title('Stock Out')]
    public function render()
    {
        return view('livewire.transaksi.stock-masuk');
    }
}
