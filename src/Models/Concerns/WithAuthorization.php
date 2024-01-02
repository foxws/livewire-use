<?php

namespace Foxws\LivewireUse\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

trait WithAuthorization
{
    use AuthorizesRequests;

    protected function can(string $ability, mixed $model): void
    {
        $this->authorize($ability, $model);
    }

    protected function canViewAny(Model|string $model): void
    {
        if ($model instanceof Model) {
            $model = $model->getMorphClass();
        }

        $this->can('viewAny', $model);
    }

    protected function canView(Model|array $model): void
    {
        $this->can('view', $model);
    }

    protected function canCreate(Model|array $model): void
    {
        $this->can('create', $model);
    }

    protected function canUpdate(Model|array $model): void
    {
        $this->can('update', $model);
    }

    protected function canDelete(Model|array $model): void
    {
        $this->can('delete', $model);
    }
}
