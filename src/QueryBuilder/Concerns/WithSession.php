<?php

namespace Foxws\LivewireUse\QueryBuilder\Concerns;

use Foxws\LivewireUse\Views\Concerns\WithHash;

trait WithSession
{
    use WithHash;

    protected static bool $store = true;

    protected static array $storeOnly = [];

    protected function store(): void
    {
        if (! static::$store) {
            return;
        }

        $data = $this->prepareStore();

        session()->put($this->fingerprint(), $data);
    }

    protected function restore(): void
    {
        $this->fill($this->getStore());

        rescue(
            fn () => $this->validate(),
            fn () => $this->resetStore(),
            report: false
        );
    }

    protected function resetStore(): void
    {
        session()->pull($this->fingerprint());

        $this->reset();
    }

    protected function getStore(): ?array
    {
        return session()->get($this->fingerprint());
    }

    protected function prepareStore(): array
    {
        return filled(static::$storeOnly)
            ? $this->only(static::$storeOnly)
            : $this->all();
    }
}
