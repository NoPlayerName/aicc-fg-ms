<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\SsoCallbackPage;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
     Route::get('/auth/sso/callback', SsoCallbackPage::class)->name('sso.callback');
});
