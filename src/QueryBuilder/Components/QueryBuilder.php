<?php

namespace Foxws\LivewireUse\QueryBuilder\Components;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use Laravel\Scout\Builder as ScoutBuilder;
use Livewire\Component;
use Livewire\WithPagination;

abstract class QueryBuilder extends Component
{
    use WithPagination;

    protected static string $model;

    public function boot(): void
    {
        throw_if(! is_subclass_of(static::$model, Model::class));

        $this->authorize('viewAny', static::$model);
    }

    abstract public function render(): View;

    abstract public function builder(): Builder|ScoutBuilder|Paginator;
}
