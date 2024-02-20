<?php

namespace Foxws\LivewireUse\Ui\Components;

use Foxws\LivewireUse\Views\Components\Component;

class Drawer extends Component
{
    protected static string $view = 'ui.drawer';

    public function __construct(
        public ?bool $right = false,
    ) {
    }
}
