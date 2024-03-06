<?php

namespace Foxws\LivewireUse\Actions\Components;

use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\View\View;

class Link extends Component
{
    public function __construct(
        public bool $active = false,
        public bool $external = false,
        public bool $navigate = true,
        public ?string $route = null,
    ) {
    }

    public function render(): View
    {
        return view('livewire-use::actions.link');
    }

    public function isRoute(): bool
    {
        return filled($this->route) && request()->routeIs($this->route);
    }

    public function isRequest(): bool
    {
        return ! $this->external && request()->fullUrlIs(
            $this->attributes->get('href')
        );
    }
}
