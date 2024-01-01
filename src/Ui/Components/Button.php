<?php

namespace Foxws\LivewireUse\Ui\Components;

use Foxws\LivewireUse\Support\Blade\Component;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\View\View;

class Button extends Component
{
    public function __construct(
        public string|Htmlable|null $label = null,
        public string|Htmlable|null $prepend = null,
        public string|Htmlable|null $append = null,
        public string|null $link = null,
    ) {}

    public function render(): View
    {
        return view('livewire-use::ui.button');
    }
}
