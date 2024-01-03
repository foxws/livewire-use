<?php

namespace Foxws\LivewireUse\Views\Forms;

use Foxws\LivewireUse\Forms\Components\Form as BaseForm;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Locked;

abstract class Form extends BaseForm
{
    #[Locked]
    public ?Model $model = null;

    #[Locked]
    public ?string $modelClass = null;

    abstract public function submit(): void;

    abstract protected function handle(): void;
}
