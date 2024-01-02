<?php

namespace Foxws\LivewireUse\Models\Concerns;

use Illuminate\Database\Eloquent\Model;

trait WithAuthorization
{
    protected function can(string $ability, ?Model $model = null): void
    {
        abort_if(! $model && ! property_exists(static::class, 'model'), 403);

        $this->authorize($ability, $model ?? static::$model);
    }

    protected function canViewAny(?Model $model = null): void
    {
        $this->can('viewAny', $model);
    }

    protected function canView(?Model $model = null): void
    {
        $this->can('viewAny', $model);
    }

    protected function canCreate(?Model $model = null): void
    {
        $this->can('create', $model);
    }

    protected function canUpdate(?Model $model = null): void
    {
        $this->can('update', $model);
    }

    protected function canDelete(?Model $model = null): void
    {
        $this->can('delete', $model);
    }
}
