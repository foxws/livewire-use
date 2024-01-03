<?php

namespace Foxws\LivewireUse\QueryBuilder\Concerns;

use Livewire\Form;

trait WithSession
{
    public function mountWithSession(): void
    {
        collect($this->getFormObjects())
            ->filter(fn (Form $form) => method_exists($form, 'restore'))
            ->each(fn (Form $form) => $form->restore());
    }
}
