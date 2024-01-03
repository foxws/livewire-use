<?php

namespace Foxws\LivewireUse\QueryBuilder\Concerns;

use Livewire\Form;

trait WithSession
{
    public function mountWithSession(): void
    {
        $forms = collect($this->getFormObjects());

        $forms
            ->filter(fn (Form $form) => method_exists($form, 'restore'))
            ->each(fn (Form $form) => $form->restore());
    }
}
