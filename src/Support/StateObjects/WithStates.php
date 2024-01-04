<?php

namespace Foxws\LivewireUse\Support\StateObjects;

use Livewire\Drawer\Utils;

trait WithStates
{
    public function getStateObjects(): array
    {
        $states = [];

        foreach ($this->all() as $key => $value) {
            if ($value instanceof State) {
                $states[] = $value;
            }
        }

        return $states;
    }
}
