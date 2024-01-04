<?php

namespace Foxws\LivewireUse\Support\StateObjects;

use Livewire\Drawer\Utils;
use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;
use Livewire\Features\SupportAttributes\AttributeCollection;

use function Livewire\wrap;

class StateObjectSynth extends Synth {
    public static $key = 'state';

    static function match($target)
    {
        return $target instanceof State;
    }

    function dehydrate($target, $dehydrateChild)
    {
        $data = $target->toArray();

        foreach ($data as $key => $child) {
            $data[$key] = $dehydrateChild($key, $child);
        }

        return [$data, ['class' => get_class($target)]];
    }

    function hydrate($data, $meta, $hydrateChild)
    {
        $state = new $meta['class']($this->context->component, $this->path);

        $callBootMethod = static::bootStateObject($this->context->component, $state, $this->path);

        foreach ($data as $key => $child) {
            if ($child === null && Utils::propertyIsTypedAndUninitialized($state, $key)) {
                continue;
            }

            $state->$key = $hydrateChild($key, $child);
        }

        $callBootMethod();

        return $state;
    }

    function set(&$target, $key, $value)
    {
        if ($value === null && Utils::propertyIsTyped($target, $key)) {
            unset($target->$key);
        } else {
            $target->$key = $value;
        }
    }

    public static function bootStateObject($component, $state, $path)
    {
        $component->mergeOutsideAttributes(
            AttributeCollection::fromComponent($component, $state, $path . '.')
        );

        return function () use ($state) {
            wrap($state)->boot();
        };
    }
}

