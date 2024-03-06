<?php

namespace Foxws\LivewireUse\Navigation\Components;

use Closure;
use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\View\View;

class Navbar extends Component
{
    public function __construct(
        public string|Htmlable|null $start = null,
        public string|Htmlable|null $end = null,
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('livewire-use::navigation.navbar');
    }
}
