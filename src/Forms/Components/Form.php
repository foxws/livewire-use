<?php

namespace Foxws\LivewireUse\Forms\Components;

use Foxws\LivewireUse\Forms\Concerns\WithSession;
use Livewire\Form as BaseForm;

abstract class Form extends BaseForm
{
    use WithSession;

    public function submit(): void
    {
        //
    }
}
