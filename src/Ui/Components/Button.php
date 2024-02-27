<?php

namespace Foxws\LivewireUse\Ui\Components;

use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\Contracts\Support\Htmlable;

class Button extends Component
{
    protected static string $view = 'ui.button';

    public function __construct(
        public string|Htmlable|null $label = null,
        public string|Htmlable|null $prepend = null,
        public string|Htmlable|null $append = null,
    ) {
    }
}
