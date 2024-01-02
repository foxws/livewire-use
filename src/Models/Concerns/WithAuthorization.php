<?php

namespace Foxws\LivewireUse\Models\Concerns;

use Illuminate\Database\Eloquent\Model;

trait WithAuthorization
{
    protected function canViewAny(Model|string $model): void
    {
        if ($model instanceof Model) {
            $model = $model->getMorphClass();
        }

        $this->authorize('viewAny', $model);
    }

    protected function canView(Model $model): void
    {
        $this->can('viewAny', $model);
    }

    protected function canCreate(Model $model): void
    {
        $this->can('create', $model);
    }

    protected function canUpdate(Model $model): void
    {
        $this->can('update', $model);
    }

    protected function canDelete(Model $model): void
    {
        $this->can('delete', $model);
    }
}
