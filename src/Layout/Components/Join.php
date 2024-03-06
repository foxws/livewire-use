<?php

namespace Foxws\LivewireUse\Layout\Components;

use Closure;
use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\View\View;

class Join extends Component
{
    public function __construct(
        public bool $vertical = false,
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('livewire-use::layout.join');
    }
}
