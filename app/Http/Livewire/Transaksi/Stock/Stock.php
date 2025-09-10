<?php

namespace App\Http\Livewire\Transaksi\Stock;

use App\Services\Permission\PermissionService;
use Livewire\Attributes\Title;
use Livewire\Component;

class Stock extends Component
{
    public $canAccess =  false;

    public function showDetail($id)
    {
        // dd($id);
        $this->dispatch('show-detail', id: $id);
    }
    public function mount()
    {
        $this->canAccess = PermissionService::userHasPermission(1);
    }

    #[Title('Data Stock')]
    public function render()
    {
        return view('livewire.transaksi.stock.stock');
    }
}
