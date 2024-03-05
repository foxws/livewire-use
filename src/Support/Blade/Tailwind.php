<?php

namespace Foxws\LivewireUse\Support\Blade;

use Illuminate\Support\Arr;

class Tailwind
{
    public static function classAttributes(array|string $values = []): array
    {
        $values = Arr::wrap($values);

        return collect($values)
            ->sortBy(fn (string $value, string $key) => $key)
            ->unique()
            ->all();
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
