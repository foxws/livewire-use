<?php

namespace Foxws\LivewireUse\Ui\Components;

use Closure;
use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\View\View;

class Card extends Component
{
    public function __construct(
        public bool $vertical = false,
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('livewire-use::ui.card');
    }
}
