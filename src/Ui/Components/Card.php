<?php

namespace Foxws\LivewireUse\Ui\Components;

use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\Contracts\Support\Htmlable;

class Card extends Component
{
    protected static string $view = 'ui.card';

    public function __construct(
        public string|Htmlable|null $title = null,
        public string|Htmlable|null $actions = null,
    ) {
    }
}
