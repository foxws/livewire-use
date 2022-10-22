<?php

namespace Foxws\LivewireUse\Concerns;

trait WithProperty
{
    protected function getProperty(string $key, mixed $default = null): mixed
    {
        return data_get($this, $key, $default);
    }

    protected function setProperty(string $key, mixed $value = null): mixed
    {
        return data_set($this, $key, $value);
    }
}
