<?php

namespace Foxws\LivewireUse\Layout\Components;

use Closure;
use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\View\View;

class Container extends Component
{
    public function render(): View|Closure|string
    {
        return view('livewire-use::layout.container');
    }
}
