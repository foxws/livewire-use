<?php

namespace Foxws\LivewireUse\Forms\Concerns;

use Livewire\Attributes\Validate;

trait WithSelected
{
    #[Validate('nullable|array|max:50')]
    public array $selected = [];

    public function getSelected(): array
    {
        return $this->get('selected', []);
    }

    public function hasSelected(): bool
    {
        return count($this->selected) > 0;
    }

    public function isSelected(...$item): bool
    {
        return collect($item)
            ->filter(fn ($item) => in_array($item, $this->getSelected()))
            ->isNotEmpty();
    }

    public function resetSelected(): void
    {
        $this->reset('selected');
    }
}
