<?php

namespace App\Http\Livewire\Transaksi\StockOut;

use Livewire\Attributes\Title;
use Livewire\Component;

class StockKeluar extends Component
{

    public function openModal()
    {

        $this->dispatch('open-modal');
    }

    #[Title('Stock Out')]
    public function render()
    {
        return view('livewire.transaksi.stock-out.stock-keluar');
    }
}
