<?php

namespace Foxws\LivewireUse\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Foxws\LivewireUse\LivewireUse
 *
 * @method static void routes()
 * @method static void registerComponents(string $name, string $namespace, string $prefix, ?Closure $callback = null)
 * @method static void registerLivewireComponents(string $name, string $namespace, string $prefix, ?Closure $callback = null)
 * @method static Stringable componentName(DiscoveredClass $class, string $namespace, string $prefix)
 * @method static Stringable componentNamespace(DiscoveredClass $class, string $namespace)
 * @method static string componentPrefix(string $prefix)
 */
class LivewireUse extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Foxws\LivewireUse\LivewireUse::class;
    }
}
