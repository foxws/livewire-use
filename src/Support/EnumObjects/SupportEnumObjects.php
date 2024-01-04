<?php

namespace Foxws\LivewireUse\Support\EnumObjects;

use Livewire\ComponentHook;

class SupportEnumObjects extends ComponentHook
{
    public static function provide()
    {
        app('livewire')->propertySynthesizer(
            EnumObjectSynth::class
        );
    }
}
