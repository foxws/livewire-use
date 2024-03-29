<?php

namespace Foxws\LivewireUse\Models\Forms;

use Foxws\LivewireUse\Forms\Support\Form;

abstract class CreateForm extends Form
{
    protected ?string $model = null;

    public function submit(): void
    {
        $this->canCreate($this->model);

        parent::submit();
    }

    protected function set(string $class): void
    {
        $this->canCreate($class);

        $this->model = $class;
    }

    protected function handle(): void
    {
        app(static::$model)::create(
            $this->all()
        );
    }
}
