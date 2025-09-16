<?php

namespace App\Http\Livewire\MasterData\Pallet;

use App\Http\Livewire\BaseLivewireComponent;
use App\Services\Master\PalletService;
use Livewire\Attributes\On;
use Livewire\Component;

class MasterPallet extends BaseLivewireComponent
{
    public $form = [
        'pallet_no'   => '',
        'name' => '',
        'pallet_type' => '',
        'color'       => '',
        'is_active'   => true,
    ];

    public function edit($id)
    {
        $this->form = app(PalletService::class)->getPalletById($id);

        $this->dispatch('editForm', data: $this->form, id: $id)->to(FormEditPallet::class);
    }


    public function deleteConfirm($id)
    {
        $this->dispatch('delete-confirm', id: $id);
    }



    public function delete($id)
    {
        app(PalletService::class)->deletePallet($id);
    }


    public function render()
    {
        return view('livewire.master-data.pallet.master-pallet');
    }
}
