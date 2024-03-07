<?php

namespace Foxws\LivewireUse\Actions\Components;

use Foxws\LivewireUse\Views\Components\Component;

class Link extends Component
{
    protected static string $view = 'actions.link';

    public function __construct(
        public bool $active = false,
        public bool $external = false,
        public bool $navigate = true,
        public ?string $route = null,
    ) {
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
