<?php

namespace Foxws\LivewireUse\Views\Concerns;

use Illuminate\Contracts\Support\Htmlable;

trait WithActions
{
    public Htmlable|string|null $actions = null;
}
