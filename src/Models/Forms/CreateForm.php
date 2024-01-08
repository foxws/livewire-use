<?php

namespace Foxws\LivewireUse\Models\Forms;

use Foxws\LivewireUse\Forms\Components\Form;
use Livewire\Attributes\Locked;

abstract class CreateForm extends Form
{
    #[Locked]
    public ?string $model = null;

    public function submit(): void
    {
        $this->canCreate($this->model);

        parent::submit();

        $this->callHook('beforeHandle');

        $this->handle();

        $this->callHook('afterHandle');
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
