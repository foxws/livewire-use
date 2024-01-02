<?php

namespace Foxws\LivewireUse\Forms\Components;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\View\View;

class TextInput extends Field
{
    public function __construct(
        public string|Htmlable|null $label = null,
        public string|Htmlable|null $hint = null,
        public string|Htmlable|null $prepend = null,
        public string|Htmlable|null $append = null,
    ) {
    }

    public function render(): View
    {
        return view('livewire-use::forms.text-input');
    }
}
