<?php

namespace Foxws\LivewireUse\Models\Forms;

use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Locked;

class EditForm extends Form
{
    #[Locked]
    public ?Model $model = null;

    public function set(Model $model): void
    {
        $this->authorize('update', $model);

        $this->model = $model;
    }

    public function submit(): void
    {
        $this->authorize('update', $this->model);

        $this->validate();

        $this->handle();
    }

    public function delete(): void
    {
        $this->authorize('delete', $this->model);

        $this->model->delete();
    }

    protected function handle(): void
    {
        $this->model->update(
            $this->all()
        );
    }
}
