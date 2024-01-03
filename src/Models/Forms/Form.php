<?php

namespace Foxws\LivewireUse\Models\Forms;

use Foxws\LivewireUse\Forms\Components\Form as BaseForm;
use Foxws\LivewireUse\Models\Concerns\WithAuthorization;

abstract class Form extends BaseForm
{
    use WithAuthorization;

    abstract public function submit();

    abstract protected function handle();
}
