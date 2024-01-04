<?php

namespace Foxws\LivewireUse\Support\EnumObjects;

use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;

class EnumObjectSynth extends Synth
{
    public static $key = 'senm';

    public static function match($target)
    {
        return $target instanceof \Spatie\Enum\Laravel\Enum;
    }

    public function dehydrate($target)
    {
        return [
            $target->value,
            ['class' => get_class($target)],
        ];
    }

    public function hydrate($value, $meta)
    {
        if (blank($value)) {
            return null;
        }

        $class = $meta['class'];

        return $class::from($value);
    }
}
