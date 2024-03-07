<?php

namespace Foxws\LivewireUse\Views\Concerns;

trait WithLivewire
{
    public function wireModel(): ?string
    {
        return $this->attributes->whereStartsWith('wire:model')->first();
    }
}
