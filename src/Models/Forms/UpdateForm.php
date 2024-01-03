<?php

namespace Foxws\LivewireUse\Models\Forms;

use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Locked;

class UpdateForm extends Form
{
    #[Locked]
    public ?Model $model = null;

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

    public function set(Model $model): void
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
