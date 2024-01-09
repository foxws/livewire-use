<?php

namespace Foxws\LivewireUse;

use Foxws\LivewireUse\Auth\Controllers\LoginController;
use Foxws\LivewireUse\Auth\Controllers\LogoutController;
use Foxws\LivewireUse\Auth\Controllers\RegisterController;
use Foxws\LivewireUse\Support\Discover\ComponentScout;
use Foxws\LivewireUse\Support\Discover\LivewireScout;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Stringable;
use Livewire\Livewire;
use Spatie\StructureDiscoverer\Data\DiscoveredClass;


class LivewireUse
{
    public static function routes(): void
    {
        Route::name('auth.')->group(function () {
            Route::get('/login', LoginController::class)->name('login');
            Route::get('/logout', LogoutController::class)->name('logout');
            Route::get('/register', RegisterController::class)->name('register');
        });
    }

    public static function registerComponents(string $path, ?string $prefix = null): void
    {
        $components = ComponentScout::create()
            ->path($path)
            ->prefix($prefix)
            ->get();

        collect($components)
            ->each(function (DiscoveredClass $class) {
                $name = static::componentName($class);

                Blade::component($class->getFcqn(), $name->value());
            });
    }

    public static function registerLivewireComponents(string $path, ?string $prefix = null): void
    {
        $components = LivewireScout::create()
            ->path($path)
            ->prefix($prefix)
            ->get();

        collect($components)
            ->each(function (DiscoveredClass $class) {
                $name = static::componentName($class);

                Livewire::component($name->value(), $class->getFcqn());
            });
    }

    public static function componentPrefix(DiscoveredClass $class, string $app = 'App\\'): Stringable
    {
        return str($class->namespace)
            ->after($app)
            ->match('/(.*)\\\\/')
            ->kebab()
            ->finish('-');
    }

    public static function componentName(DiscoveredClass $class): Stringable
    {
        return str($class->name)
            ->kebab()
            ->prepend(static::componentPrefix($class));
    }
}
