<?php

namespace Foxws\LivewireUse\Forms\Components;

use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\Contracts\Support\Htmlable;

class Label extends Component
{
    protected static string $view = 'forms.label';

    public function __construct(
        public bool $required = false,
        public bool|string|Htmlable|null $error = null,
        public string|Htmlable|null $hint = null,
    ) {
    }
}
