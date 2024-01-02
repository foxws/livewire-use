<?php

namespace Foxws\LivewireUse\QueryBuilder\Concerns;

use Illuminate\Support\Sleep;
use Livewire\Attributes\Locked;
use Livewire\WithPagination;

trait WithScroll
{
    use WithPagination;

    #[Locked]
    public array $items = [];

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

    protected function mergeItems(array $values = []): void
    {
        $this->items = array_merge_recursive(
            $this->items,
            $values,
        );
    }
}
