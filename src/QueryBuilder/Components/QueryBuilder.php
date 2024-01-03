<?php

namespace Foxws\LivewireUse\QueryBuilder\Components;

use Foxws\LivewireUse\QueryBuilder\Concerns\WithSession;
use Foxws\LivewireUse\QueryBuilder\Forms\QueryBuilderForm;
use Foxws\LivewireUse\Views\Concerns\WithForms;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use Laravel\Scout\Builder as ScoutBuilder;
use Livewire\Component;

/**
 * @property QueryBuilderForm $form
 */
abstract class QueryBuilder extends Component
{
    use WithForms;
    use WithSession;

    protected static string $model;

    public function boot(): void
    {
        throw_if(! is_subclass_of(static::$model, Model::class));

        $this->authorize('viewAny', static::$model);
    }

    abstract public function render(): View;

    abstract public function builder(): Builder|ScoutBuilder|Paginator;
}
