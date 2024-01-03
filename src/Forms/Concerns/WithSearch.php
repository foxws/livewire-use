<?php

namespace Foxws\LivewireUse\Forms\Concerns;

use Illuminate\Support\Stringable;
use Livewire\Attributes\Validate;

trait WithSearch
{
    #[Validate('nullable|string|max:32')]
    public ?string $search = null;

    public function getSearch(): ?string
    {
        return $this
            ->prepareSearch()
            ->value();
    }

    public function hasSearch(): bool
    {
        return $this
            ->prepareSearch()
            ->isNotEmpty();
    }

    public function isSearch(?string $value = null): bool
    {
        return $this
            ->prepareSearch()
            ->exactly($value);
    }

    public function resetSearch(): void
    {
        $this->reset('search');
    }

    protected function prepareSearch(): Stringable
    {
        return str($this->get('search', ''))
            ->headline()
            ->squish();
    }
}
