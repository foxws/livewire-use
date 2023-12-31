<?php

namespace Foxws\QueryBuilder\Concerns;

use Livewire\Attributes\Url;

trait WithSorts
{
    #[Url(as: 's', except: '', history: true)]
    public ?string $sort = null;

    #[Url(as: 'd', except: '', history: true)]
    public ?string $direction = null;

    public function hasSort(): bool
    {
        return filled($this->sort);
    }

    public function isSort(?string $value = null): bool
    {
        return $this->sort === $value;
    }

    public function resetSort(): void
    {
        $this->reset('sort');
    }

    public function resetDirection(): void
    {
        $this->reset('direction');
    }

    public function resetSorting(): void
    {
        $this->resetSort();

        $this->resetDirection();
    }
}
