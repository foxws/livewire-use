<?php

namespace Foxws\LivewireUse\Views\Components;

use Foxws\LivewireUse\Views\Concerns;
use Illuminate\View\View;

abstract class Component extends \Illuminate\View\Component
{
    use Concerns\WithHash;

    protected static string $view;

    public function render(): View
    {
        return view($this->getView());
    }

    protected function getView(): string
    {
        return str(static::$view)
            ->kebab()
            ->prepend(config('livewire-use.views_prefix'))
            ->value();
    }
}
