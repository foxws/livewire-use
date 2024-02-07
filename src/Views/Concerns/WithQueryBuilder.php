<?php

namespace Foxws\LivewireUse\Views\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Builder as ScoutBuilder;

/**
 * @property string $model
 */
trait WithQueryBuilder
{
    protected static int $limit = 16;

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

    protected function getScout(string $value = '*'): ScoutBuilder
    {
        return $this->getModel()
            ->search($value);
    }

    protected function getLimit(): int
    {
        return static::$limit;
    }
}
