<?php

namespace Foxws\LivewireUse\Facades;

use Foxws\LivewireUse\Auth\Controllers\LoginController;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Route;

/**
 * @see \Foxws\LivewireUse\LivewireUse
 */
class LivewireUse extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Foxws\LivewireUse\LivewireUse::class;
    }

    public static function routes(): void
    {
        Route::name('auth.')->group(function () {
            Route::get('/login', LoginController::class)->name('login');
        });
    }
}
