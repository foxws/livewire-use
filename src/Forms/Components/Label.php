<?php

namespace Foxws\LivewireUse\Forms\Components;

use Illuminate\Contracts\Support\Htmlable;

class Label extends Field
{
    protected static string $view = 'forms.label';

    public function __construct(
        public string|Htmlable|null $label = null,
        public bool|null $required = null,
        public bool|null $inline = null,
    ) {
    }
}
