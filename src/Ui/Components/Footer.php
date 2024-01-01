<?php

namespace Foxws\LivewireUse\Ui\Components;

use Foxws\LivewireUse\Support\Blade\Component;
use Illuminate\View\View;

class Footer extends Component
{
    public function render(): View
    {
        return view('livewire-use::ui.footer');
    }
}
