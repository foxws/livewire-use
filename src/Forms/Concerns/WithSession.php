<?php

namespace Foxws\LivewireUse\Forms\Concerns;

use Foxws\LivewireUse\Views\Concerns\WithHash;

trait WithSession
{
    use WithHash;

    protected static bool $store = false;

    protected static array $storeOnly = [];

    public function restore(): void
    {
        if (! static::$store || ! $this->hasStore()) {
            return;
        }

        rescue(
            fn () => $this->fill($this->getStore()) && $this->validate(),
            fn () => $this->resetStore(),
        );
    }

    public function store(): void
    {
        if (! static::$store || ! $this->storeWhen()) {
            return;
        }

        // Make sure to not store any invalid data
        $this->validate();

        session()->put($this->classHash(), serialize($this->storeWith()));
    }

    public function forget(): void
    {
        session()->forget($this->classHash());
    }

    protected function getStore(): array
    {
        return unserialize(session()->get($this->classHash(), []));
    }

    protected function hasStore(): bool
    {
        return session()->has($this->classHash());
    }

    protected function storeWhen(): bool
    {
        return true;
    }

    protected function storeWith(): array
    {
        return filled(static::$storeOnly)
            ? $this->only(static::$storeOnly)
            : $this->all();
    }
}
