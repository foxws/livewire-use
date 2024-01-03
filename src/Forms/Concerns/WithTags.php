<?php

namespace Foxws\LivewireUse\Forms\Concerns;

use Livewire\Attributes\Validate;

trait WithTags
{
    #[Validate('nullable|array|max:3')]
    public ?array $tags = null;

    public function getTags(): ?array
    {
        return $this->get('tags');
    }

    public function resetTags(): void
    {
        $this->reset('tags');
    }
}
