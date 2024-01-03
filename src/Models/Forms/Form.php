<?php

namespace Foxws\LivewireUse\Models\Forms;

use Foxws\LivewireUse\Forms\Components\Form as BaseForm;
use Foxws\LivewireUse\Models\Concerns\WithAuthorization;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Locked;

abstract class Form extends BaseForm
{
    use WithAuthorization;

    #[Locked]
    public ?Model $model = null;

    #[Locked]
    public ?string $modelClass = null;

    abstract public function submit();

    abstract protected function handle();
}
