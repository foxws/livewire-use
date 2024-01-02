<?php

namespace Foxws\LivewireUse\QueryBuilder\Forms;

use Foxws\LivewireUse\QueryBuilder\Concerns\WithSession;
use Livewire\Form;

abstract class QueryBuilderForm extends Form
{
    use WithSession;

    public function submit(): void
    {
        $this->validate();

        $this->store();
    }

    public function destroy(): void
    {
        $this->resetStore();
    }
}
