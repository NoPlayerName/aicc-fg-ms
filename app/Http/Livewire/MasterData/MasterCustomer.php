<?php

namespace App\Http\Livewire\MasterData;

use Livewire\Attributes\Title;
use Livewire\Component;

class MasterCustomer extends Component
{
    public $id;
    public $name;
    public $initial;


    public function openModal()
    {

        $this->dispatch('open-modal');
    }

    public function update()
    {
        $this->dispatch('open-modal');
    }

    #[Title('Master Customer')]
    public function render()
    {
        return view('livewire.master-data.master-customer');
    }
}
