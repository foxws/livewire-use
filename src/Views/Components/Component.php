<?php

namespace Foxws\LivewireUse\Views\Components;

use Foxws\LivewireUse\Views\Concerns\WithHash;
use Illuminate\View\View;

abstract class Component extends \Illuminate\View\Component
{
    use WithHash;

    protected static string $view;

    public function render(): View
    {
        $name = str(static::$view)
            ->kebab()
            ->prepend(config('livewire-use.views_prefix'))
            ->value();

        return view($name);
    }
}
