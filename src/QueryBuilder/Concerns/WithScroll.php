<?php

namespace Foxws\LivewireUse\QueryBuilder\Concerns;

use Foxws\LivewireUse\QueryBuilder\Components\QueryBuilder;
use Illuminate\Support\Sleep;
use Livewire\Attributes\Locked;

trait WithScroll
{
    #[Locked]
    public array $items = [];

    public function bootWithScroll(): void
    {
        throw_if(! is_subclass_of(static::class, QueryBuilder::class));
    }

    public function mountWithScroll(): void
    {
        if (blank($this->items)) {
            $range = range(1, min(25, $this->builder()->currentPage()));

            foreach ($range as $page) {
                $this->mergeItems(
                    $this->builder($page)->all()
                );

                Sleep::for(100)->milliseconds();
            }
        }
    }

    public function updatedPage(): void
    {
        $this->mergeItems(
            $this->builder()->all()
        );
    }

    public function resetScroll(): void
    {
        $this->reset('items');

        $this->resetPage();
    }

    public function hasItems(): bool
    {
        return count($this->items) > 0;
    }

    public function onFirstPage(): bool
    {
        return $this->builder()->onFirstPage();
    }

    public function onLastPage(): bool
    {
        return $this->builder()->onLastPage();
    }

    protected function mergeItems(array $values = []): void
    {
        $this->items = array_merge_recursive(
            $this->items,
            $values,
        );
    }
}
