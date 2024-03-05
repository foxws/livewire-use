<?php

namespace Foxws\LivewireUse\Support\Blade;

class Tailwind
{
    public static function classAttributes(string $value = ''): string
    {
        return str($value)
            ->matchAll('/class:(\w+)=/')
            ->sortBy(fn (string $value, string $key) => $key)
            ->join(' ');
    }

    public static function classSort(array|string $value = ''): string
    {
        return str((string) $value)
            ->squish()
            ->split('/[\s,]+/')
            ->sort(fn (string $value) => str($value)->startsWith('!'))
            ->join(' ');
    }

    public static function classKey(string $value): string
    {
        return str($value)->startsWith('class:') ? $value : "class:{$value}";
    }
}
