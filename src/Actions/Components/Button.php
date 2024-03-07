<?php

namespace Foxws\LivewireUse\Actions\Components;

use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\Contracts\Support\Htmlable;

class Button extends Component
{
    protected static string $view = 'actions.button';

    public function __construct(
        public string|Htmlable|null $label = '',
    ) {
    }
}
