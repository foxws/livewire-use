<?php

namespace Foxws\LivewireUse\Support\Livewire\ModelStateObjects;

use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;
use Spatie\ModelStates\State;

class ModelStateObjectSynth extends Synth
{
    public static $key = 'mstt';

    public static function match($target)
    {
        if (! class_exists('Spatie\ModelStates\State', false)) {
            return false;
        }

        return $target instanceof State;
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
