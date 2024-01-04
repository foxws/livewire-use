<?php

namespace Foxws\LivewireUse\Support\ModelStateObjects;

use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;

class ModelStateObjectSynth extends Synth
{
    public static $key = 'mstt';

    public static function match($target)
    {
        return $target instanceof \Spatie\ModelStates\State;
    }

    public function dehydrate($target)
    {
        return [$target->getMorphClass(), []];
    }

    public function hydrate($value)
    {
        return $value;
    }
}
