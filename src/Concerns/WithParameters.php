<?php

namespace Foxws\LivewireUse\Concerns;

trait WithParameters
{
    protected function getParameter(string $key, mixed $default = null): mixed
    {
        return data_get($this, $key, $default);
    }

    protected function setParameter(string $key, mixed $value = null): mixed
    {
        return data_set($this, $key, $value);
    }
}
