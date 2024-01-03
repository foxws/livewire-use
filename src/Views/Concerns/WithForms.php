<?php

namespace Foxws\LivewireUse\Views\Concerns;

use Livewire\Form;

trait WithForms
{
    protected function getForm(?string $name = null): ?Form
    {
        $forms = collect($this->getFormObjects());

        return blank($name)
            ? $forms->first()
            : $forms->firstWhere('propertyName', $name);
    }

    protected function getFormValue(string $name, ?string $form = null): mixed
    {
        if (! $form = $this->getForm($form)) {
            return null;
        }

        return $form->getPropertyValue($name);
    }

    protected function getFormValues(?string $form = null): mixed
    {
        if (! $form = $this->getForm($form)) {
            return null;
        }

        return $form->all();
    }

    protected function hasFormProperty(string $name, ?string $form = null): mixed
    {
        if (! $form = $this->getForm($form)) {
            return null;
        }

        return $form->hasProperty($name);
    }

    protected function resetFormValue(string $name, ?string $form = null): void
    {
        if (! $form = $this->getForm($form)) {
            return;
        }

        $form->reset($name);
    }
}
