<?php

use App\Http\Controllers\Master\Customer\CustomerController;
use App\Http\Controllers\Master\Pallet\PalletController;
use App\Http\Controllers\Transaction\Pallet\CustomerPalletsController;
use App\Http\Controllers\Master\Rack\RackController;
use App\Http\Controllers\Transaction\StockChange\StockChangeController;
use App\Http\Controllers\Transaction\StockIn\StockInController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\MasterData\MasterCustomer;
use App\Http\Livewire\MasterData\Pallet\MasterPallet;
use App\Http\Livewire\MasterData\MasterProduk;
use App\Http\Livewire\MasterData\Rack;
use App\Http\Livewire\Pallet\Customerpallets;
use App\Http\Livewire\StockChange\StockChange;
use App\Http\Livewire\Transaksi\Stock\Stock;
use App\Http\Livewire\Transaksi\StockOut\StockKeluar;
use App\Http\Livewire\Transaksi\StockIn\StockMasuk;
use App\Models\Master\Customer;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth:web', 'permission'])->group(function () {
    Route::prefix('/')->name('')->group(function () {
        Route::get('/', Dashboard::class)->name('dashboard');
        Route::prefix('transaksi')->name('transaksi.')->group(function () {
            Route::get('/data-stock', Stock::class)->name('stock.index');
            Route::get('/stock-keluar', StockKeluar::class)->name('stock.keluar.index');
            Route::get('/stock-masuk', StockMasuk::class)->name('stock.masuk.index');
            Route::get('/customer-pallets', [CustomerPalletsController::class, 'getAmount'])->name('customer.pallets.data');
            Route::get('/stock-change/data', [StockChangeController::class, 'filterData'])->name('stock.change.data');
            Route::get('/stock-in/data', [StockInController::class, 'getData'])->name('stock.in.data');
            Route::get('/stock-in/data-summary', [StockInController::class, 'getSummary'])->name('stock.in.data-summary');
        });
        Route::prefix('master')->name('master.')->group(function () {
            Route::get('/data-customer', MasterCustomer::class)->name('customer.index');
            Route::get('/data-customer/data', [CustomerController::class, 'getData'])->name('customer.data');
            Route::get('/data-produk', MasterProduk::class)->name('produk.index');
            Route::get('/rack', Rack::class)->name('rack.index');
            Route::get('/rack/data', [RackController::class, 'getData'])->name('rack.data');
            Route::get('/master-pallet', MasterPallet::class)->name('master-pallet.index');
            Route::get('/master-pallet', MasterPallet::class)->name('master-pallet.index');
            Route::get('/master-pallet/data', [PalletController::class, 'getData'])->name('master-pallet.data');
        });
        Route::get('stock-change', StockChange::class)->name('stock.change.index');
        Route::get('customer-pallets', Customerpallets::class)->name('customer.pallets.index');
    });
});



require __DIR__ . '/auth.php';
