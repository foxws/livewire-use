<?php

namespace Foxws\LivewireUse\Forms\Components;

use Foxws\LivewireUse\Auth\Concerns\WithAuthorization;
use Foxws\LivewireUse\Exceptions\RateLimitedException;
use Foxws\LivewireUse\Forms\Concerns\WithForm;
use Foxws\LivewireUse\Forms\Concerns\WithSession;
use Foxws\LivewireUse\Forms\Concerns\WithThrottle;
use Foxws\LivewireUse\Forms\Concerns\WithValidation;
use Foxws\LivewireUse\Support\Concerns\WithHooks;
use Livewire\Form as BaseForm;

abstract class Form extends BaseForm
{
    use WithAuthorization;
    use WithForm;
    use WithHooks;
    use WithSession;
    use WithThrottle;
    use WithValidation;

    public function submit(): void
    {
        try {
            $this->rateLimit();

            $this->callHook('beforeValidate');

            $this->check();

            $this->callHook('afterValidate');

            $this->store();

            $this->callHook('beforeHandle');

            $this->handle();

            $this->callHook('afterHandle');
        } catch (RateLimitedException $e) {
            $this->handleThrottle($e);
        }
    }

    protected function handle(): void
    {
        //
    }
}
