<?php

namespace Foxws\LivewireUse\Forms\Concerns;

trait WithValidation
{
    protected static bool $recoverable = false;

    public function check(): void
    {
        if (static::$recoverable) {
            rescue(
                fn () => $this->validate(),
                fn () => $this->reset(),
            );

            return;
        }

        $this->validate();
    }
}
