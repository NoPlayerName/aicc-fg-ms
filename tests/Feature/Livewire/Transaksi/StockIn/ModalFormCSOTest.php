<?php

use App\Http\Livewire\Transaksi\StockIn\ModalFormCSO;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ModalFormCSO::class)
        ->assertStatus(200);
});
