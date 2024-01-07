<?php

namespace Foxws\LivewireUse\Models\Forms;

abstract class CreateForm extends Form
{
    public function submit(): void
    {
        $this->canCreate($this->modelClass);

        parent::submit();

        $this->callHook('beforeHandle');

        $this->handle();

        $this->callHook('afterHandle');
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
