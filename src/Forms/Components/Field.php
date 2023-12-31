<?php

namespace Foxws\LivewireUse\Forms\Components;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\View\Component;

abstract class Field extends Component
{
    public string|Htmlable|null $label = null;

    public string|Htmlable|null $icon = null;

    public string|Htmlable|null $hint = null;

    public string|Htmlable|null $prepend = null;

    public string|Htmlable|null $append = null;

    public string|Htmlable|null $prefix = null;

    public string|Htmlable|null $suffix = null;

    public function __construct(
        public ?string $uuid = null,
        public ?string $name = null,
    ) {
        data_set($this, 'uuid', md5(serialize($this)), false);
    }

    public function wireModel(): ?string
    {
        return $this->attributes->whereStartsWith('wire:model')->first();
    }
}
