<?php

namespace Foxws\LivewireUse\Support\Concerns;

trait WithHooks
{
    protected function callHook(string $hook, ...$args): mixed
    {
        if (method_exists($this, $hook)) {
            return $this->{$hook}(...$args);
        }

        return value($hook, $args);
    }
}
