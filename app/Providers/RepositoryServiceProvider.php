<?php

namespace App\Providers;

use App\Repositories\Pallet\PalletRepository;
use App\Repositories\Pallet\PalletRepositoryInterface;
use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Rack\RackRepository;
use App\Repositories\Rack\RackRepositoryInterface;
use App\Repositories\StockChange\StockChangeRepository;
use App\Repositories\StockChange\StockChangeRepositoryInterface;
use App\Repositories\Transaction\Stock\StockRepository;
use App\Repositories\Transaction\Stock\StockRepositoryInterface;
use App\Repositories\Transaction\StockIn\StockInRepository;
use App\Repositories\Transaction\StockIn\StockInRepositoryInterface;
use App\Repositories\Transaction\StockOut\StockOutRepository;
use App\Repositories\Transaction\StockOut\StockOutRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $bindings = [
            PalletRepositoryInterface::class => PalletRepository::class,
            RackRepositoryInterface::class => RackRepository::class,
            CustomerRepositoryInterface::class => CustomerRepository::class,
            StockChangeRepositoryInterface::class => StockChangeRepository::class,
            StockInRepositoryInterface::class => StockInRepository::class,
            StockRepositoryInterface::class => StockRepository::class,
            StockOutRepositoryInterface::class => StockOutRepository::class,
            ProductRepositoryInterface::class => ProductRepository::class
        ];

        foreach ($bindings as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
