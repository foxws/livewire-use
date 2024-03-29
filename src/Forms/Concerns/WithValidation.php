<?php

namespace Foxws\LivewireUse\Forms\Concerns;

trait WithValidation
{
    protected static bool $recoverable = false;

    public function check(): void
    {
        if (! static::$recoverable) {
            $this->validate();

            return;
        }

        rescue(
            fn () => $this->validate(),
            fn () => $this->reset(),
        );
    }
}
