<?php

namespace Foxws\LivewireUse\QueryBuilder\Concerns;

use Livewire\Attributes\Validate;

trait WithChecked
{
    #[Validate('nullable|array|max:50')]
    public ?array $checked = null;

    public function hasChecked(): bool
    {
        return count($this->checked) > 0;
    }

    public function isChecked(string|int|null $value = null): bool
    {
        return in_array($value, $this->checked);
    }

    public function resetChecked(): void
    {
        $this->reset('checked');
    }
}
