<?php

namespace App\Providers;

use App\Repositories\Pallet\PalletRepository;
use App\Repositories\Pallet\PalletRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            PalletRepositoryInterface::class, PalletRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
