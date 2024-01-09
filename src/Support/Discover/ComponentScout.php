<?php

namespace Foxws\LivewireUse\Support\Discover;

use Illuminate\Support\Stringable;
use Illuminate\View\Component;
use Spatie\StructureDiscoverer\Cache\DiscoverCacheDriver;
use Spatie\StructureDiscoverer\Cache\LaravelDiscoverCacheDriver;
use Spatie\StructureDiscoverer\Data\DiscoveredClass;
use Spatie\StructureDiscoverer\Discover;
use Spatie\StructureDiscoverer\StructureScout;

class ComponentScout extends StructureScout
{
    public ?string $path = null;

    public ?string $prefix = null;

    protected function definition(): Discover
    {
        return Discover::in($this->path)
            ->extending(Component::class)
            ->full();
    }

    public function cacheDriver(): DiscoverCacheDriver
    {
        return new LaravelDiscoverCacheDriver(
            prefix: $this->prefix,
        );
    }


    public function prefix(string $prefix): static
    {
        $this->prefix = $prefix;

        return $this;
    }

    public function path(string $path): static
    {
        $this->path = $path;

        return $this;
    }
}
