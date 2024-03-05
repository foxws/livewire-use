<?php

namespace Foxws\LivewireUse\Support\Blade;

class Tailwind
{
    public static function classAttributes(string|array $value = [])
    {
        return str($value)
            ->matchAll('/:(.*?)\=/s');
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
