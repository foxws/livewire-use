<?php

namespace Foxws\LivewireUse\Forms\Concerns;

use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Validate;

trait WithTags
{
    #[Validate('nullable|array|max:5')]
    public array $tags = [];

    public function getTags(): ?array
    {
        return $this->get('tags');
    }

    public function hasTags(...$items): bool
    {
        return collect($items)
            ->map(fn ($item) => $item instanceof Model
                ? $item->getRouteKey()
                : $item
            )
            ->filter(fn ($item) => in_array($item, $this->getTags()))
            ->isNotEmpty();
    }

    public function resetTags(): void
    {
        $this->reset('tags');
    }
}
