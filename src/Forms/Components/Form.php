<?php

namespace Foxws\LivewireUse\Forms\Components;

use Foxws\LivewireUse\Forms\Concerns\WithSession;
use Foxws\LivewireUse\Forms\Concerns\WithValidation;
use Foxws\LivewireUse\Views\Concerns\WithAuthorization;
use Foxws\LivewireUse\Views\Concerns\WithHooks;
use Foxws\LivewireUse\Views\Concerns\WithRateLimit;
use Livewire\Form as BaseForm;

abstract class Form extends BaseForm
{
    use WithAuthorization;
    use WithHooks;
    use WithRateLimit;
    use WithSession;
    use WithValidation;

    public function submit(): void
    {
        $this->callHook('beforeValidate');

        $this->check();

        $this->callHook('afterValidate');

        $this->store();

        $this->handle();

        $this->callHook('afterHandle');
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

    protected function handle(): mixed
    {
        //
    }
}
