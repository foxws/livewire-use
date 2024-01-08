<?php

namespace Foxws\LivewireUse\Models\Forms;

use Foxws\LivewireUse\Forms\Components\Form;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Locked;

class UpdateForm extends Form
{
    #[Locked]
    public ?Model $model = null;

    public function submit(): void
    {
        $this->canUpdate($this->model);

        parent::submit();

        $this->callHook('beforeHandle');

        $this->handle();

        $this->callHook('afterHandle');
    }

    public function delete(): void
    {
        $this->canDelete($this->model);

        $this->model->delete();
    }

    protected function set(Model $model): void
    {
        $this->canUpdate($model);

        $this->model = $model;
    }

    protected function handle(): void
    {
        $this->model->update(
            $this->all()
        );
    }
}
