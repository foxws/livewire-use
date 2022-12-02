<?php

namespace Foxws\LivewireUse\Concerns;

use Foxws\LivewireUse\Support\Attributes;

trait WithAttributes
{
    public Attributes $attributes;

    public function bootWithAttributes(): void
    {
        data_set($this, 'attributes', new Attributes(), false);
    }

    protected function resetAttributes(): void
    {
        data_set($this, 'attributes', new Attributes());
    }

    protected function getAttribute(string $key, mixed $default = null): mixed
    {
        return $this->attributes->get($key, $default);
    }

    protected function setAttribute(string $key, mixed $value = null): void
    {
        $this->attributes->{$key} = $value;
    }

    protected function setAttributes(array $attributes = []): void
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }
    }
}
