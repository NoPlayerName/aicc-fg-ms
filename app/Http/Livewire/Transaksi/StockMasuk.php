<?php

namespace App\Http\Livewire\Transaksi;

use App\Services\Permission\PermissionService;
use Livewire\Attributes\Title;
use Livewire\Component;

class StockMasuk extends Component
{

    public $typeForm;
    public $canAccess =  false;

    public function openModal($id)
    {
        $this->typeForm = $id;
        $this->dispatch('open-modal');
    }


    public function mount()
    {
        $this->canAccess = PermissionService::userHasPermission(1);
    }


    #[Title('Stock In')]
    public function render()
    {
        return view('livewire.transaksi.stock-masuk');
    }
}
