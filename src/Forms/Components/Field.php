<?php

namespace Foxws\LivewireUse\Forms\Components;

use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\Contracts\Support\Htmlable;

abstract class Field extends Component
{
    public string|Htmlable|null $label = null;

    public string|Htmlable|null $hint = null;

    public string|Htmlable|null $prepend = null;

    public string|Htmlable|null $append = null;
}
