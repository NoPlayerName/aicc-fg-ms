<?php

namespace App\Http\Livewire\MasterData;

use Livewire\Attributes\Title;
use Livewire\Component;

class MasterProduk extends Component
{

    public $id;


    public function openModal()
    {
        $this->id = 1;
        // $this->dispatchBrowserEvent('open-modal', ['id' => 'productModal']);
        // $this->js("$('#productModal').modal('show')");
        $this->dispatch('open-modal');
    }

    public function update()
    {
        $this->dispatch('open-modal');
    }


    #[Title('Master Product')]
    public function render()
    {
        return view('livewire.master-data.master-produk');
    }
}
