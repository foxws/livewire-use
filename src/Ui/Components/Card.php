<?php

namespace Foxws\LivewireUse\Ui\Components;

use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\View\View;

class Card extends Component
{
    public function __construct(
        public bool $vertical = false,
    ) {
    }

    public function render(): View
    {
        return view('livewire-use::ui.card');
    }
}
