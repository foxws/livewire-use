<?php

namespace Foxws\LivewireUse\Models\Forms;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Form as BaseForm;

abstract class Form extends BaseForm
{
    use AuthorizesRequests;

    abstract public function submit(): void;

    abstract protected function handle(): void;
}
