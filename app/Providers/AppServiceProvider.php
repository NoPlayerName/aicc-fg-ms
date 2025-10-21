<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $basePath = parse_url(config('app.url'), PHP_URL_PATH) ?? '';

        // Set route JS Livewire secara dinamis
        Livewire::setScriptRoute(function ($handle) use ($basePath) {
            return Route::get("{$basePath}/livewire/livewire.js", $handle);
        });

        // Set route update Livewire secara dinamis
        Livewire::setUpdateRoute(function ($handle) use ($basePath) {
            return Route::post("{$basePath}/livewire/update", $handle);
        });
    }
}
