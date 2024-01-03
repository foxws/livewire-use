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
        if (! static::$store) {
            return;
        }

        $this->fill($this->getStore());

        rescue(
            fn () => $this->validate(),
            fn () => $this->resetStore(),
            report: false
        );
    }

    public function store(): void
    {
        if (! static::$store) {
            return;
        }

        $data = $this->prepareStore();

        session()->put($this->classHash(), $data);
    }

    public function resetStore(): void
    {
        session()->pull($this->classHash());

        $this->reset();
    }

    protected function getStore(): array
    {
        return session()->get($this->classHash(), []);
    }

    protected function prepareStore(): array
    {
        return filled(static::$storeOnly)
            ? $this->only(static::$storeOnly)
            : $this->all();
    }
}
