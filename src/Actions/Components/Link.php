<?php

namespace Foxws\LivewireUse\Actions\Components;

use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\View\View;

class Link extends Component
{
    public function __construct(
        public bool $navigate = true,
        public bool $active = false,
        public ?string $route = null,
    ) {
    }

    public function render(): View
    {
        return view('livewire-use::actions.link');
    }

    public function isRequest(): bool
    {
        return request()->fullUrlIs($this->attributes->get('href'));
    }

    public function isRoute(): bool
    {
        return filled($this->route) && request()->routeIs($this->route);
    }
}
