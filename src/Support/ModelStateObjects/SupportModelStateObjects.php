<?php

namespace Foxws\LivewireUse\Support\ModelStateObjects;

use Livewire\ComponentHook;

class SupportModelStateObjects extends ComponentHook
{
    public static function provide()
    {
        app('livewire')->propertySynthesizer(
            ModelStateObjectSynth::class
        );
    }
}
