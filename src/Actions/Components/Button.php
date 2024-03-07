<?php

namespace Foxws\LivewireUse\Actions\Components;

use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\View\View;

class Button extends Component
{
    public function __construct(
        public string|Htmlable|null $label = '',
    ) {
    }

    public function render(): View
    {
        return view('livewire-use::actions.button');
    }
}
