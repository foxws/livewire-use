<?php

namespace Foxws\LivewireUse\Layout\Components;

use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\View\View;

class Join extends Component
{
    public function __construct(
        public bool $vertical = false,
    ) {
    }

    public function render(): View
    {
        return view('livewire-use::layout.join');
    }
}
