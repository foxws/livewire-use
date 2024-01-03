<?php

namespace Foxws\LivewireUse\Models\Forms;

use Livewire\Attributes\Locked;

abstract class CreateForm extends Form
{
    #[Locked]
    public ?string $model = null;

    public function submit(): void
    {
        $this->canCreate($this->model);

        $this->validate();

        $this->handle();
    }

    protected function handle(): void
    {
        app(static::$model)::create(
            $this->all()
        );
    }
}
