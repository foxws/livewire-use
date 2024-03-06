<?php

namespace Foxws\LivewireUse\Views\Concerns;

trait WithModel
{
    public function wireModel(): ?string
    {
        return $this->attributes->whereStartsWith('wire:model')->first();
    }
}
