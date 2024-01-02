<?php

namespace Foxws\LivewireUse\QueryBuilder\Forms;

use Foxws\LivewireUse\QueryBuilder\Concerns\WithSearch;
use Foxws\LivewireUse\QueryBuilder\Concerns\WithSorts;
use Livewire\Form;

class FilterForm extends Form
{
    use WithSearch;
    use WithSorts;

    public function submit(): void
    {
        $this->validate();
    }
}
