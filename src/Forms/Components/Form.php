<?php

namespace Foxws\LivewireUse\Forms\Components;

use Foxws\LivewireUse\Forms\Concerns\WithSession;
use Foxws\LivewireUse\Views\Concerns\WithAuthorization;
use Livewire\Form as BaseForm;

abstract class Form extends BaseForm
{
    use WithAuthorization;
    use WithSession;

    protected static bool $recoverable = false;

    public function submit(): void
    {
        $this->check();

        $this->store();
    }

    public function check(): void
    {
        if (! static::$recoverable) {
            $this->validate();

            return;
        }

        rescue(
            fn () => $this->validate(),
            fn () => $this->reset(),
            report: false
        );
    }
}
