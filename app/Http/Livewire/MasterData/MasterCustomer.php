<?php

namespace App\Http\Livewire\MasterData;

use App\Http\Livewire\BaseLivewireComponent;
use Livewire\Attributes\Title;

class MasterCustomer extends BaseLivewireComponent
{
    public $customer;

    public function mount()
    {
        $this->mountBase();
        if (!$this->can('can_access')) {
            session()->flash('no_permission', 'You no Have Permission');
            return redirect()->route('dashboard');
        }
    }

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
