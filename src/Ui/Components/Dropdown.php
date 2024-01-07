<?php

namespace Foxws\LivewireUse\Ui\Components;

use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\Contracts\Support\Htmlable;

class Dropdown extends Component
{
    protected static string $view = 'ui.dropdown';

    public function __construct(
        public string|Htmlable|null $content = null,
    ) {
    }
}
