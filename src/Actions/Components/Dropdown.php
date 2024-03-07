<?php

namespace Foxws\LivewireUse\Actions\Components;

use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\Contracts\Support\Htmlable;

class Dropdown extends Component
{
    protected static string $view = 'actions.dropdown';

    public function __construct(
        public string|Htmlable|null $actions = null,
    ) {
    }
}
