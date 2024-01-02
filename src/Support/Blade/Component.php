<?php

namespace Foxws\LivewireUse\Support\Blade;

use Illuminate\View\Component as BaseComponent;

abstract class Component extends BaseComponent
{
    public function uuid(): string
    {
        $checksum = crc32(serialize($this));

        return printf('%u', $checksum);
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
