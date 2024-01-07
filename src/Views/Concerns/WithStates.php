<?php

namespace Foxws\LivewireUse\Views\Concerns;

use Foxws\LivewireUse\Support\Livewire\StateObjects\State;

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
