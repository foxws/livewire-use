<?php

namespace Foxws\LivewireUse\Views\Forms;

use Illuminate\Database\Eloquent\Model;

class UpdateForm extends Form
{
    public function submit(): void
    {
        parent::submit();

        $this->callHook('beforeHandle');

        $this->handle();

        $this->callHook('afterHandle');
    }

    public function delete(): void
    {
        throw_if(! $this->model);

        $this->canDelete($this->model);

        $this->model->delete();
    }

    protected function beforeValidate(): void
    {
        $this->canUpdate($this->model);
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
