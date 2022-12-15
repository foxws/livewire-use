<?php

namespace Foxws\LivewireUse\Concerns;

use Foxws\LivewireUse\Support\State;
use Illuminate\Support\Arr;

trait WithState
{
    public State $state;

    public function bootWithState(): void
    {
        data_set($this, 'state', new State(), false);
    }

    protected function resetState(): void
    {
        data_set($this, 'state', new State());
    }

    protected function getState(string $key, mixed $default = null): mixed
    {
        return $this->state->get($key, $default);
    }

    protected function setState(string $key, mixed $value = null): void
    {
        $this->state->{$key} = $value;
    }

    protected function fillState(array $value = []): void
    {
        collect($value)
            ->each(fn (mixed $value = null, string $key) => $this->setState($key, $value));
    }

    protected function fillStateOnly(array $value = [], array|string $keys = []): void
    {
        $this->fillState(Arr::only($value, $keys));
    }

    protected function fillStateExcept(array $value = [], array|string $keys = []): void
    {
        $this->fillState(Arr::except($value, $keys));
    }
}
