<?php

namespace Foxws\LivewireUse\Forms\Components;

use Foxws\LivewireUse\Views\Components\Component;
use Foxws\LivewireUse\Views\Concerns\WithHash;

abstract class Field extends Component
{
    use WithHash;

    public function id(): string
    {
        return $this->wireModel() ?? $this->hash();
    }

    public function wireModel(): ?string
    {
        return $this->attributes->whereStartsWith('wire:model')->first();
    }
}
