<?php

namespace Foxws\LivewireUse\Forms\Components;

use Illuminate\View\Component as BaseComponent;

abstract class Component extends BaseComponent
{
    public function __construct(
        public ?string $uuid = null,
        public ?string $name = null,
    ) {
        $this->uuid ??= md5(serialize($this));
    }

    public function id(): string
    {
        return $this->name ?: $this->wireModel() ?: $this->uuid;
    }

    public function wireModel(): ?string
    {
        return $this->attributes->whereStartsWith('wire:model')->first();
    }
}
