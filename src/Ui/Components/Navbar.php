<?php

namespace Foxws\LivewireUse\Ui\Components;

use Foxws\LivewireUse\Support\Blade\Component;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\View\View;

class Navbar extends Component
{
    public function __construct(
        public string|null $activeClass = null,
        public string|null $inactiveClass = null,
        public string|Htmlable|null $start = null,
        public string|Htmlable|null $end = null,
        public string|Htmlable|null $menu = null,
    ) {}

    public function render(): View
    {
        return view('livewire-use::ui.navbar');
    }

    public function isRoute(string $name): bool
    {
        return request()->routeIs($name);
    }
}
