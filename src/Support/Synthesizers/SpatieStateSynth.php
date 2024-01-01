<?php

namespace Foxws\LivewireUse\Support\Synthesizers;

use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;
use Spatie\ModelStates\State;

class SpatieStateSynth extends Synth
{
    public static $key = 'sta';

    public static function match($target)
    {
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
