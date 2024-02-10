<?php

namespace Foxws\LivewireUse\Support\Concerns;

trait WithHooks
{
    protected function callHook(string $hook): void
    {
        if (! method_exists($this, $hook)) {
            return;
        }

        $this->{$hook}();
    }
}