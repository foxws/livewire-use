<?php

namespace Foxws\LivewireUse\Support\Discover;

use Livewire\Component;
use Spatie\StructureDiscoverer\Discover;

class LivewireScout extends ComponentScout
{
    protected function definition(): Discover
    {
        return Discover::in($this->path)
            ->extending(Component::class)
            ->full();
    }
}
