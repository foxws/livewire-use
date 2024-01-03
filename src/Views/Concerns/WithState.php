<?php

namespace Foxws\LivewireUse\Views\Concerns;

use Foxws\LivewireUse\Views\Support\State;
use Illuminate\Support\Collection;
use Illuminate\Support\Fluent;
use Livewire\Attributes\Computed;

/**
 * @property array $states
 */
trait WithState
{
    #[Computed(persist: true)]
    public function state(): Fluent
    {
        return new Fluent($this->getStates() ?? []);
    }

    protected function getStates(): Collection
    {
        return collect(static::$states ?? [])
            ->filter(fn (string $state) => is_subclass_of($state, State::class))
            ->mapWithKeys(fn (string $state) => app($state)->toArray());
    }
}
