<?php

namespace Foxws\LivewireUse\Forms\Concerns;

use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Validate;

trait WithTags
{
    #[Validate('nullable|array|max:5')]
    public ?array $tags = [];

    public function getTags(): ?array
    {
        return $this->get('tags');
    }

    public function hasTag(Model|string|null $value = null): bool
    {
        if ($value instanceof Model) {
            $value = $value->getRouteKey();
        }

        return in_array($value, $this->getTags() ?? []);
    }

    public function resetTags(): void
    {
        $this->reset('tags');
    }
}
