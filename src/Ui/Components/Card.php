<?php

namespace Foxws\LivewireUse\Ui\Components;

use Foxws\LivewireUse\Views\Components\Component;

class Card extends Component
{
    protected static string $view = 'ui.card';

    public function __construct(
        public bool $vertical = false,
    ) {
    }
}
