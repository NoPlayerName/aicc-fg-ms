<?php

namespace App\Http\Livewire\MasterData\Pallet;

use App\Services\Master\PalletService;
use Livewire\Component;

class FormPallet extends Component
{


    public $form = [
        'pallet_no'   => '',
        'name' => '',
        'pallet_type' => '',
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
            'form.is_active'   => 'required',
        ];
    }


    public function save()
    {
        $this->validate();

        // dd($this->form);
        app(PalletService::class)->savePallet($this->form);
        $this->reset('form');
        $this->dispatch('saved');
    }


    public function render()
    {
        return view('livewire.master-data.pallet.form-pallet');
    }
}
