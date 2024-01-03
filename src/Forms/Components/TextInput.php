<?php

namespace Foxws\LivewireUse\Forms\Components;

use Illuminate\Contracts\Support\Htmlable;

class TextInput extends Field
{
    protected static string $view = 'forms.text-input';

    public function __construct(
        public string|Htmlable|null $label = null,
        public string|Htmlable|null $hint = null,
        public string|Htmlable|null $prepend = null,
        public string|Htmlable|null $append = null,
    ) {
    }
}
