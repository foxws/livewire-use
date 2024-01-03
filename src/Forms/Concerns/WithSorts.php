<?php

namespace Foxws\LivewireUse\Forms\Concerns;

use Illuminate\Support\Arr;
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

    public function hasSort(): bool
    {
        if (property_exists(static::class, 'sorters')) {
            return filled($this->sort) && in_array($this->sort, $this->sorters);
        }

        if (method_exists(static::class, 'sorters')) {
            return filled($this->sort) && Arr::has($this->sorters(), $this->sort);
        }

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
