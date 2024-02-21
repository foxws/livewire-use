<?php

namespace Foxws\LivewireUse\States\Concerns;

use Foxws\LivewireUse\Support\Livewire\StateObjects\State;
use Illuminate\Support\Collection;

trait WithStates
{
    protected function getStateObjects(): Collection
    {
        return collect($this->all())
            ->filter(fn (mixed $value) => $value instanceof State);
    }
}
