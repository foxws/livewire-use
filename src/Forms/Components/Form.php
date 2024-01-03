<?php

namespace Foxws\LivewireUse\Forms\Components;

use Foxws\LivewireUse\Forms\Concerns\WithSession;
use Foxws\LivewireUse\Models\Concerns\WithAuthorization;
use Livewire\Form as BaseForm;

abstract class Form extends BaseForm
{
    use WithAuthorization;
    use WithSession;

    abstract public function submit(): void;

    abstract protected function handle(): void;
}
