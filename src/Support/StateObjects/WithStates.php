<?php

namespace Foxws\LivewireUse\Support\StateObjects;

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
