<?php

namespace Foxws\LivewireUse\Forms\Concerns;

use Illuminate\Validation\ValidationException;

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

    public function blank(...$properties): bool
    {
        return collect($this->only($properties))
            ->filter()
            ->isEmpty();
    }

    public function clear(bool $submit = true): void
    {
        $keys = array_keys($this->all());

        $this->reset($keys);

        if ($submit) {
            $this->submit();
        }
    }

    public function fails($rules = null, $messages = [], $attributes = []): bool
    {
        try {
            $this->parentValidate($rules, $messages, $attributes);
        } catch (ValidationException $e) {
            return invade($e->validator)->fails();
        }

        return false;
    }
}
