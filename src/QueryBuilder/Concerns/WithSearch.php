<?php

namespace Foxws\QueryBuilder\Concerns;

use Livewire\Attributes\Url;

trait WithSearch
{
    #[Url(as: 'q', except: '', history: true)]
    public ?string $search = null;

    public function hasSearch(): bool
    {
        return filled($this->search);
    }

    public function isSearch(?string $value = null): bool
    {
        return $this->search === $value;
    }

    public function resetSearch(): void
    {
        $this->reset('search');
    }
}
