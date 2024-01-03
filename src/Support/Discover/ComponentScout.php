<?php

namespace Foxws\LivewireUse\Support\Discover;

use Illuminate\View\Component;
use Spatie\StructureDiscoverer\Cache\DiscoverCacheDriver;
use Spatie\StructureDiscoverer\Cache\LaravelDiscoverCacheDriver;
use Spatie\StructureDiscoverer\Discover;
use Spatie\StructureDiscoverer\StructureScout;

class ComponentScout extends StructureScout
{
    protected function definition(): Discover
    {
        return Discover::in(__DIR__.'/../..')
            ->extending(Component::class)
            ->full();
    }

    public function cacheDriver(): DiscoverCacheDriver
    {
        return new LaravelDiscoverCacheDriver(
            prefix: 'livewire-use',
        );
    }
}
