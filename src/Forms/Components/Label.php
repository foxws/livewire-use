<?php

namespace Foxws\LivewireUse\Forms\Components;

use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\Contracts\Support\Htmlable;

class Label extends Component
{
    protected static string $view = 'forms.label';

    public function __construct(
        public string|Htmlable|null $label = null,
        public ?bool $required = null,
        public ?bool $inline = null,
    ) {
    }
}
