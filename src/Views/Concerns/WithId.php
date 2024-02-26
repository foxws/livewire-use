<?php

namespace Foxws\LivewireUse\Views\Concerns;

trait WithId
{
    public ?string $id = null;

    public function id(): ?string
    {
        return $this->id ?? $this->wireModel();
    }

    public function wireModel(): ?string
    {
        return $this->attributes->whereStartsWith('wire:model')->first();
    }
}
