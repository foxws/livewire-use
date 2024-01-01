<?php

namespace Foxws\LivewireUse\Forms\Components;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\View\Component;
use Illuminate\View\View;

class Field extends Component
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
        $this->uuid ??= md5(serialize($this));
    }

    public function render(): View
    {
        return view('livewire-use::forms.field');
    }

    public function wireModel(): ?string
    {
        return $this->attributes->whereStartsWith('wire:model')->first();
    }
}
