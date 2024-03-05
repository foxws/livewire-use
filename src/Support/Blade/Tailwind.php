<?php

namespace Foxws\LivewireUse\Support\Blade;

class Tailwind
{
    public static function classAttributes(string|array $value = [])
    {
        logger($value);
        return str($value)
            ->matchAll('/:(.*?)\=/s');
            // ->sortBy(fn (string $value, string $key) => $key);
    }

    public static function classSort(string|array $value = []): string
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
