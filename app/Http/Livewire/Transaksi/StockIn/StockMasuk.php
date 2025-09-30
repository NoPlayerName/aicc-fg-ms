<?php

namespace App\Http\Livewire\Transaksi\StockIn;

use App\Http\Livewire\BaseLivewireComponent;
use App\Services\Permission\PermissionService;
use App\Services\Transaction\StockInService;
use Livewire\Attributes\Title;

class StockMasuk extends BaseLivewireComponent
{

    public $typeForm;
    public $canAccess =  false;
    public $startDate;
    public $endDate;
    public $searchKey;

    protected $listeners = ['refresh' => 'refreshTable'];

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
    // public function updated($property, $value)
    // {
    //     // Hanya trigger jika properti ini yang berubah
    //     if (in_array($property, ['startDate', 'endDate', 'searchKey'])) {
    //         $this->search();
    //     }
    // }

    public function openModalSnp()
    {
        $this->dispatch('showModalSnp');
        $this->dispatch('resetFormSnp')->to(ModalFormSnp::class);
    }

    public function openModalCso()
    {
        $this->dispatch('showModalCso');
    }


    public function refreshTable()
    {
        $this->dispatch('refreshTableSNP');
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
        $data = app(StockInService::class)->getId($id);

        $this->dispatch('formUpdate', data: $data, id: $id)->to(FormUpdate::class);
    }

    #[Title('Stock In')]
    public function render()
    {
        return view('livewire.transaksi.stock-in.stock-masuk');
    }
}
