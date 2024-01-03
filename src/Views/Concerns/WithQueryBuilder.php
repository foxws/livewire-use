<?php

namespace Foxws\LivewireUse\Views\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $model
 */
trait WithQueryBuilder
{
    public function bootWithQueryBuilder(): void
    {
        throw_if(! is_subclass_of(static::$model, Model::class));

        $this->authorize('viewAny', static::$model);
    }

    protected function getModel(): Model
    {
        return app(static::$model);
    }

    protected function getQuery(): Builder
    {
        return $this->getModel()
            ->query();
    }
}
