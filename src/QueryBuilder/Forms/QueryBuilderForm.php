<?php

namespace Foxws\LivewireUse\QueryBuilder\Forms;

use Foxws\LivewireUse\Forms\Concerns\WithSession;
use Livewire\Form;

abstract class QueryBuilderForm extends Form
{
    use WithSession;

    public function submit(): void
    {
        $this->validate();

        $this->store();
    }

    public function restore(): void
    {
        $this->fill($this->getStore());

        // Validate restored session
        rescue(
            fn () => $this->validate(),
            fn () => $this->resetStore(),
            report: false
        );
    }

    public function destroy(): void
    {
        $this->resetStore();
    }
}
