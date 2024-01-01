<?php

namespace Foxws\LivewireUse\Forms\Components;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\View\View;

class Form extends Component
{
    public string|Htmlable|null $actions = null;

    public function render(): View
    {
        return view('livewire-use::forms.form');
    }
}
