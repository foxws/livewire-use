<?php

namespace Foxws\LivewireUse\Support\Discover;

use Illuminate\View\Component;
use Spatie\StructureDiscoverer\Cache\LaravelDiscoverCacheDriver;
use Spatie\StructureDiscoverer\Discover;
use Spatie\StructureDiscoverer\StructureScout;

class ComponentScout extends StructureScout
{
    public ?string $path = null;

    public ?string $prefix = null;

    protected function definition(): Discover
    {
        return Discover::in($this->path)
            ->parallel()
            ->extending(Component::class)
            ->full();
    }

    public function identifier(): string
    {
        return implode('-', [static::class, $this->prefix]);
    }

    public function cacheDriver(): LaravelDiscoverCacheDriver
    {
        return new LaravelDiscoverCacheDriver(
            prefix: $this->identifier(),
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

    public function all(): array
    {
        return $this->isCached()
            ? $this->get()
            : $this->cache();
    }
}
