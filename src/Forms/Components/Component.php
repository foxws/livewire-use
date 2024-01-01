<?php

namespace Foxws\LivewireUse\Forms\Components;

use Illuminate\View\Component as BaseComponent;

abstract class Component extends BaseComponent
{
    public function uuid(): string
    {
        return md5(serialize($this));
    }

    public function id(): string
    {
        return $this->wireModel() ?: $this->uuid();
    }

    public function wireModel(): ?string
    {
        return $this->attributes->whereStartsWith('wire:model')->first();
    }
}
