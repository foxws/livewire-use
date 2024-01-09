<?php

namespace Foxws\LivewireUse\Forms\Concerns;

use Livewire\Attributes\Validate;

trait WithFeatures
{
    #[Validate('nullable|array|max:5')]
    public array $features = [];

    public function getFeatures(): array
    {
        return $this->get('features', []);
    }

    public function hasFeatures(...$item): bool
    {
        return collect($item)
            ->filter(fn ($item) => in_array($item, $this->getFeatures()))
            ->isNotEmpty();
    }

    public function resetFeatures(): void
    {
        $this->reset('features');
    }
}
