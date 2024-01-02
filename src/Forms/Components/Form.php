<?php

namespace Foxws\LivewireUse\Forms\Components;

use Foxws\LivewireUse\Support\Blade\Component;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\View\View;

class Form extends Component
{
    public function __construct(
        public string|Htmlable|null $actions = null,
    ) {
    }

    public function render(): View
    {
        return view('livewire-use::forms.form');
    }
}
