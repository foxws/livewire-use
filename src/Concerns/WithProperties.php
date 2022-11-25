<?php

namespace Foxws\LivewireUse\Concerns;

use ArrayAccess;

trait WithProperties
{
    protected function getProperty(string $key, mixed $default = null): mixed
    {
        return data_get($this, $key, $default);
    }

    protected function setProperty(string $key, mixed $value = null, bool $overwrite = true): mixed
    {
        return data_set($this, $key, $value, $overwrite);
    }

    protected function setProperties(array|ArrayAccess $data, bool $overwrite = true): mixed
    {
        return collect($data)
            ->map(fn (mixed $value = null, string $key) => $this->setProperty($key, $value, $overwrite));
    }
}
