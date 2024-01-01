<?php

namespace Foxws\LivewireUse\QueryBuilder\Concerns;

use Illuminate\Support\Stringable;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;

trait WithSearch
{
    #[Validate('nullable|string|max:10')]
    #[Url(as: 'q', except: '', history: true)]
    public ?string $search = null;

    public function hasSearch(): bool
    {
        return $this->getSearch()->isNotEmpty();
    }

    public function isSearch(?string $value = null): bool
    {
        return $this->getSearch()->exactly($value);
    }

    public function resetSearch(): void
    {
        $this->reset('search');
    }

    public function getSearch(): Stringable
    {
        return str($this->search ?: '')
            ->headline()
            ->squish();
    }
}