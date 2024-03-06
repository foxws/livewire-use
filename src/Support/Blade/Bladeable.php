<?php

namespace Foxws\LivewireUse\Support\Blade;

class Bladeable
{
    public static function classSort(string $class = ''): string
    {
        return str($class)
            ->squish()
            ->split('/[\s,]+/')
            ->sort(fn (string $value) => str($value)->startsWith('!'))
            ->implode(' ');
    }

    public static function cssClassKey(string $key): string
    {
        return str($key)->startsWith('class:') ? $key : "class:{$key}";
    }
}
