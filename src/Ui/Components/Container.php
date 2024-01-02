<?php

namespace Foxws\LivewireUse\Ui\Components;

use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\View\View;

class Container extends Component
{
    public function render(): View
    {
        return view('livewire-use::ui.container');
    }
}
