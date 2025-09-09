<?php

namespace App\Http\Livewire\Transaksi\StockIn;

use Livewire\Component;

class ModalFormSnp extends Component
{
    public $id_pallet;
    public $part_no;
    public $part_name;
    public $qty;
    public $no_pallet;
    public $no_rak;
    public $part_trial;

    protected $listeners = ['openModalSNP' => 'openModal'];

    public function openModal()
    {
        $this->dispatch('showModal');
    }

    public function save()
    {
        $this->dispatch('hideModal');
        $this->dispatch('refresh');
    }

    public function mount() {}

    public function render()
    {
        return view('livewire.transaksi.stock-in.modal-form-snp');
    }
}
