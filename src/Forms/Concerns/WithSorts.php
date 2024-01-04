<?php

namespace Foxws\LivewireUse\Forms\Concerns;

use Livewire\Attributes\Validate;

trait WithSorts
{
    #[Validate('nullable|string|max:255')]
    public ?string $sort = null;

    #[Validate('nullable|string|in:asc,desc')]
    public ?string $direction = null;

    public function getSort(): ?string
    {
        return $this->get('sort');
    }

    public function isSort(?string $value = null): bool
    {
        return $this->getSort() === $value;
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
