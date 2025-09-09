<?php

namespace App\Http\Livewire\Transaksi\StockIn;

use App\Services\Permission\PermissionService;
use Livewire\Attributes\Title;
use Livewire\Component;

class StockMasuk extends Component
{

    public $typeForm;
    public $canAccess =  false;

    protected $listeners = ['refresh' => 'refreshTable'];

    public function openModal()
    {
        // $this->typeForm = $id;
        $this->dispatch('openModalSNP');
        // $this->dispatch('refreshTableSNP');
    }
    public function refreshTable()
    {
        $this->dispatch('refreshTableSNP');
    }


    public function mount()
    {
        // $this->canAccess = PermissionService::userHasPermission(1);
    }


    #[Title('Stock In')]
    public function render()
    {
        return view('livewire.transaksi.stock-in.stock-masuk');
    }
}
