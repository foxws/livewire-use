<?php

namespace Foxws\LivewireUse\Ui\Components;

use Illuminate\Contracts\Support\Htmlable;

class Button extends Link
{
    protected static string $view = 'ui.button';

    public string|Htmlable|null $label = null;

    public string|Htmlable|null $prepend = null;

    public string|Htmlable|null $append = null;
}
