<?php

namespace Foxws\LivewireUse\Forms\Components;

use Foxws\LivewireUse\Views\Components\Component;

abstract class Field extends Component
{
    public function id(): string
    {
        return $this->wireModel() ?? $this->hash();
    }
}
