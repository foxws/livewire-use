<?php

namespace Foxws\LivewireUse\Support\Tailwind;

use ArrayAccess;
use Illuminate\Support\Collection;
use Illuminate\View\ComponentAttributeBag;

class Tailwindable
{
    public static function classAttributes(ComponentAttributeBag $attributes): Collection
    {
        return collect($attributes->whereStartsWith('class:'))
            ->mapWithKeys(fn (mixed $value, string $key) => [
                str($key)->after('class:')->value() => (string) $value,
            ]);
    }

    public static function sortClasses(string $value = ''): string
    {
        return str($value)
            ->squish()
            ->split('/[\s,]+/')
            ->sortBy(fn (string $value) => str($value)->startsWith('!'))
            ->values()
            ->join(' ');
    }
}
