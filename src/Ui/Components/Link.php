<?php

namespace Foxws\LivewireUse\Ui\Components;

use Foxws\LivewireUse\Support\Blade\Component;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\View\View;

class Link extends Component
{
    public function __construct(
        public string|Htmlable|null $label = null,
    ) {}

    public function render(): View
    {
        return view('livewire-use::ui.link');
    }
}
