<?php

namespace App\Http\Livewire\Invetory;

use Livewire\Attributes\Title;
use Livewire\Component;

class StockForm extends Component
{
    #[Title('Stock Form')]
    public function render()
    {
        return view('livewire.invetory.stock-form');
    }
}
