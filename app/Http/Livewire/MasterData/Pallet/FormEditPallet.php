<?php

namespace App\Http\Livewire\MasterData\Pallet;

use App\Services\Master\PalletService;
use Livewire\Attributes\On;
use Livewire\Component;

class FormEditPallet extends Component
{
    public $pallet_id;
    public $form = [
        'pallet_no'   => '',
        'pallet_type' => '',
        'name' => '',
        'color'       => '',
        'is_active'   => false,
    ];
    protected function rules()
    {
        return [
            'form.pallet_no'   => 'required',
            'form.name' => 'required',
            'form.pallet_type' => 'required',
            'form.color'       => 'required',
            'form.is_active'   => 'boolean',
        ];
    }
    #[On('editForm')]
    public function edit($data,  $id)
    {
        $this->reset('form');
        $this->form = $data;
        $this->pallet_id = $id;
        $this->dispatch('modalEdit');
    }


    public function save()
    {
        $this->validate();
        $save = app(PalletService::class)->updatePallet($this->pallet_id, $this->form);
        $this->reset('form');
        $this->dispatch('saved');
    }
    public function render()
    {
        return view('livewire.master-data.pallet.form-edit-pallet');
    }
}
