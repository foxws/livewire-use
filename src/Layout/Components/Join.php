<?php

namespace Foxws\LivewireUse\Layout\Components;

use Foxws\LivewireUse\Views\Components\Component;

class Join extends Component
{
    protected static string $view = 'layout.join';

    public function __construct(
        public bool $vertical = false,
    ) {
    }
}
