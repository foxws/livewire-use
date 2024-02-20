<?php

namespace Foxws\LivewireUse\Forms\Concerns;

trait WithForm
{
    public function get(string $property, mixed $default = null): mixed
    {
        return $this->getPropertyValue($property) ?: $default;
    }

    public function has(...$properties): bool
    {
        return collect(array_keys($this->only($properties)))
            ->filter()
            ->isNotEmpty();
    }

    public function filled(...$properties): bool
    {
        return collect($this->only($properties))
            ->filter()
            ->isNotEmpty();
    }

    public function clear(bool $submit = true): void
    {
        $keys = array_keys($this->all());

        $this->reset($keys);

        if ($submit) {
            $this->submit();
        }
    }
}
