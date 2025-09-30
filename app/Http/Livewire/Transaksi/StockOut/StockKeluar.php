<?php

namespace App\Http\Livewire\Transaksi\StockOut;

use App\Http\Livewire\BaseLivewireComponent;
use App\Services\Transaction\StockOutService;
use Livewire\Attributes\Title;

class StockKeluar extends BaseLivewireComponent
{

    public $startDate, $endDate, $searchKey;

    public function mount()
    {
        $this->mountBase();
        if (!$this->can('can_access')) {
            session()->flash('no_permission', 'You no Have Permission');
            return redirect()->route('dashboard');
        }

        $this->startDate = now()->format('Y-m-d');
        $this->endDate   = now()->format('Y-m-d');
        $this->search();
    }

    public function openModal()
    {

        $this->dispatch('open-modal');
    }

    public function search()
    {

        $this->dispatch('filter', filter: [
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'search' => $this->searchKey,
        ]);
    }
    public function editShow($id)
    {
        $data = app(StockOutService::class)->getId($id);

        $this->dispatch('formUpdate', data: $data, id: $id)->to(FormUpdate::class);
    }

    #[Title('Stock Out')]
    public function render()
    {
        return view('livewire.transaksi.stock-out.stock-keluar');
    }
}
