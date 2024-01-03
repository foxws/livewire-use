<?php

namespace Foxws\LivewireUse\QueryBuilder\Concerns;

use Foxws\LivewireUse\Forms\Components\Form;

trait WithForms
{
    public function mountWithForms(): void
    {
        collect($this->getFormObjects())
            ->filter(fn (Form $form) => method_exists($form, 'restore'))
            ->each(fn (Form $form) => $form->restore());
    }
}
