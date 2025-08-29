<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Attributes\Title;
use Livewire\Component;

class StockKeluar extends Component
{
    #[Title('Stock Out')]
    public function render()
    {
        return view('livewire.transaksi.stock-keluar');
    }
}
