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

    public static function registerComponents(
        string $path,
        string $namespace = 'App\\',
        ?string $prefix = null
    ): void {
        $scout = ComponentScout::create()
            ->path($path)
            ->prefix($prefix)
            ->all();

        collect($scout)
            ->each(function (DiscoveredClass $class) use ($namespace) {
                $name = static::componentName($class, $namespace);

                Blade::component($class->getFcqn(), $name->value());
            });
    }

    public static function registerLivewireComponents(
        string $path,
        string $namespace = 'App\\',
        ?string $prefix = null
    ): void {
        $scout = LivewireScout::create()
            ->path($path)
            ->prefix($prefix)
            ->all();

        collect($scout)
            ->each(function (DiscoveredClass $class) use ($namespace) {
                $name = static::componentName($class, $namespace);

                Livewire::component($name->value(), $class->getFcqn());
            });
    }

    public static function componentName(DiscoveredClass $class, string $namespace): Stringable
    {
        return str($class->name)
            ->kebab()
            ->prepend(static::componentPrefix($class, $namespace));
    }

    public static function componentPrefix(DiscoveredClass $class, string $namespace): Stringable
    {
        return str($class->namespace)
            ->after($namespace)
            ->match('/(.*)\\\\/')
            ->kebab()
            ->finish('-');
    }
}
