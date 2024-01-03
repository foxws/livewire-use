<?php

namespace Foxws\LivewireUse\Models\Forms;

abstract class CreateForm extends Form
{
    public function submit(): void
    {
        if (! $this->modelClass) {
            return;
        }

        $this->canCreate($this->modelClass);

        $this->validate();

        $this->handle();
    }

    protected function set(string $class): void
    {
        $this->canCreate($class);

        $this->modelClass = $class;
    }

    protected function handle(): void
    {
        app(static::$modelClass)::create(
            $this->all()
        );
    }
}
