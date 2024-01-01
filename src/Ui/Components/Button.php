<?php

namespace Foxws\LivewireUse\Ui\Components;

use Illuminate\View\View;

class Button extends Link
{
    public function render(): View
    {
        return view('livewire-use::ui.button');
    }
}
