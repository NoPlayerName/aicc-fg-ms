<?php

namespace App\Http\Livewire\Transaksi\Stock;

use App\Services\Transaction\StockInService;
use Livewire\Attributes\On;
use Livewire\Component;

class DetailStock extends Component
{


    public $part_no;
    public $result = [];
    public $pallet_no;
    #[On('show-detail')]
    public function open($data)
    {

        $data = (object) $data;
        $this->result = app(StockInService::class)->getData($data)->get();
        $this->part_no = $data->search;
        $this->dispatch('open-detail');
    }
    public function mount() {}
    public function render()
    {
        return view('livewire.transaksi.stock.detail-stock');
    }
}
