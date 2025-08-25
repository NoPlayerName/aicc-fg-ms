<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Invetory\StockForm;
use App\Http\Livewire\Invetory\StockTable;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->name('dashboard');
Route::get('/login', Login::class)->name('login');
Route::get('/inventory/stock', StockTable::class)->name('inventory.stock.table');
Route::get('/inventory/stock-form', StockForm::class)->name('inventory.stock.form');
