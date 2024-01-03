<?php

namespace Foxws\LivewireUse\Forms\Concerns;

use Livewire\Attributes\Validate;

trait WithSelected
{
    #[Validate('nullable|array|max:50')]
    public ?array $selected = null;

    public function hasSelected(): bool
    {
        return count($this->selected) > 0;
    }

    public function isSelected(string|int|null $value = null): bool
    {
        return in_array($value, $this->selected);
    }

    public function resetSelected(): void
    {
        $this->reset('selected');
    }
}
