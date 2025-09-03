<?php

namespace App\Http\Livewire\Transaksi;

use App\Services\Permission\PermissionService;
use Livewire\Attributes\Title;
use Livewire\Component;

class Stock extends Component
{
    public $canAccess =  false;
    public function mount()
    {
        $this->canAccess = PermissionService::userHasPermission(1);
    }

    #[Title('Data Stock')]
    public function render()
    {
        return view('livewire.transaksi.stock');
    }
}
