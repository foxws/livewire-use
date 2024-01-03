<?php

namespace Foxws\LivewireUse\Views\Forms;

use Illuminate\Database\Eloquent\Model;

class UpdateForm extends Form
{
    public function submit(): void
    {
        if (! $this->model) {
            return;
        }

        $this->canUpdate($this->model);

        $this->validate();

        $this->handle();
    }

    public function delete(): void
    {
        if (! $this->model) {
            return;
        }

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
