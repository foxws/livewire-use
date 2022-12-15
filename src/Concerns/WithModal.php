<?php

namespace Foxws\LivewireUse\Concerns;

trait WithModal
{
    public string $component = '';

    public string $class = '';

    public bool $open = false;

    public bool $backdrop = true;

    public bool $focus = true;

    public bool $escapable = true;
}
