<?php

namespace Foxws\LivewireUse\QueryBuilder\Forms;

use Foxws\LivewireUse\QueryBuilder\Concerns\WithSearch;
use Foxws\LivewireUse\QueryBuilder\Concerns\WithSorts;
use Livewire\Form as BaseForm;

class Form extends BaseForm
{
    use WithSearch;
    use WithSorts;
}
