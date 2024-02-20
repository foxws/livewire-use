<?php

namespace Foxws\LivewireUse\Views\Concerns;

use Illuminate\Contracts\Support\Htmlable;

trait WithSlots
{
    public Htmlable|string|null $label = null;

    public Htmlable|string|null $hint = null;

    public Htmlable|string|null $prepend = null;

    public Htmlable|string|null $append = null;
}
