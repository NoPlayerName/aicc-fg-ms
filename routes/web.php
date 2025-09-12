<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\MasterData\MasterCustomer;
use App\Http\Livewire\MasterData\MasterProduk;
use App\Http\Livewire\StockChange\StockChange;
use App\Http\Livewire\Transaksi\Stock\Stock;
use App\Http\Livewire\Transaksi\StockOut\StockKeluar;
use App\Http\Livewire\Transaksi\StockIn\StockMasuk;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::prefix('/')->name('')->group(function () {
        Route::get('/', Dashboard::class)->name('dashboard');
        Route::prefix('transaksi')->name('transaksi.')->group(function () {
            Route::get('/data-stock', Stock::class)->name('stock.index');
            Route::get('/stock-keluar', StockKeluar::class)->name('stock.keluar.index');
            Route::get('/stock-masuk', StockMasuk::class)->name('stock.masuk.index');
        });
        Route::prefix('master')->name('master.')->group(function () {
            Route::get('/data-customer', MasterCustomer::class)->name('customer.index');
            Route::get('/data-produk', MasterProduk::class)->name('produk.index');
        });
        Route::get('stock-change', StockChange::class)->name('stock.change.index');
    });
});

require __DIR__ . '/auth.php';
