<?php

namespace Foxws\LivewireUse\Forms\Components;

use Illuminate\View\View;

class TextInput extends Field
{
    protected string $view = 'lw-forms::text-input';

    public function render(): View
    {
        return view($this->view);
    }
}
