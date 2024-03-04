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

    public static function buildClass(ComponentAttributeBag $attributes, string|array|ArrayAccess $only = []): string
    {
        return static::classAttributes($attributes)
            ->only($only)
            ->flatten()
            ->join(' ');
    }
}
