<?php

namespace Foxws\LivewireUse\Forms\Concerns;

use Livewire\Attributes\Validate;

trait WithTag
{
    #[Validate('nullable|string')]
    public ?string $tag = null;

    public function getTag(): ?string
    {
        return $this->get('tag');
    }

    public function resetTag(): void
    {
        $this->reset('tag');
    }
}
