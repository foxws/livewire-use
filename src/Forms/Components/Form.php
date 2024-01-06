<?php

namespace Foxws\LivewireUse\Forms\Components;

use Foxws\LivewireUse\Forms\Concerns\WithSession;
use Foxws\LivewireUse\Views\Concerns\WithAuthorization;
use Foxws\LivewireUse\Views\Concerns\WithHooks;
use Livewire\Form as BaseForm;

abstract class Form extends BaseForm
{
    use WithAuthorization;
    use WithHooks;
    use WithSession;

    protected static bool $recoverable = false;

    public function submit(): void
    {
        $this->callHook('beforeValidate');

        $this->check();

        $this->callHook('afterValidate');

        $this->store();

        $this->callHook('afterSubmit');
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

    public function has(string $name): bool
    {
        return $this->hasProperty($name);
    }

    public function get(string $name, mixed $default = null): mixed
    {
        return $this->getPropertyValue($name) ?: $default;
    }

    public function filled(string $name): bool
    {
        return filled($this->get($name));
    }
}
