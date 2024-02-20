<?php

namespace Foxws\LivewireUse\Ui\Components;

use Foxws\LivewireUse\Views\Components\Component;

class Dropdown extends Component
{
    protected static string $view = 'ui.dropdown';

    public function __construct(
        public ?bool $right = false,
    ) {
    }
}
