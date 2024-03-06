<?php

namespace Foxws\LivewireUse\Forms\Components;

use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\View\View;

class Input extends Component
{
    public function render(): View
    {
        return view('livewire-use::form.input');
    }
}
