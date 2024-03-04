<?php

namespace Foxws\LivewireUse\Views\Concerns;

use Illuminate\Support\Collection;

trait WithClass
{
    public function class(string $key, ?string $default = null): ?string
    {
        return data_get($this->classAttributes(), $key, $default);
    }

    public function hasClass(string $key): bool
    {
        return $this->classAttributes()->has($key);
    }

    public function classAttributes(): Collection
    {
        return collect($this->attributes->whereStartsWith('class:'))
            ->mapWithKeys(fn (mixed $value, string $key) => [
                str($key)->after('class:')->value() => (string) $value
            ]);
    }

    public function sortClasses(string $value = ''): string
    {
        return str($value)
            ->squish()
            ->split('/[\s,]+/')
            ->sortBy(fn (string $value) => str($value)->startsWith('!'))
            ->values()
            ->join(' ');
    }
}
