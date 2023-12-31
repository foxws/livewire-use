<?php

namespace Foxws\LivewireUse\Models\Forms;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Model;

class CreateForm extends Form
{
    protected static string $model;

    public function submit(): void
    {
        throw_unless(
            is_subclass_of(static::$model, Model::class),
            AuthorizationException::class
        );

        $this->authorize('create', static::$model);

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
