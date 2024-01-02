<?php

namespace Foxws\LivewireUse\Forms\Components;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\View\View;

class Label extends Field
{
    public function __construct(
        public string|Htmlable|null $label = null,
        public bool $inline = false,
    ) {
    }

    public function render(): View
    {
        return view('livewire-use::forms.label');
    }
}
