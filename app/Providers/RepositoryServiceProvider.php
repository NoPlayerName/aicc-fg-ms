<?php

namespace App\Providers;

use App\Repositories\Pallet\PalletRepository;
use App\Repositories\Pallet\PalletRepositoryInterface;
use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\Rack\RackRepository;
use App\Repositories\Rack\RackRepositoryInterface;
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
            CustomerRepositoryInterface::class => CustomerRepository::class
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
