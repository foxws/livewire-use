<?php

namespace Foxws\LivewireUse\Ui\Components;

use Foxws\LivewireUse\Views\Components\Component;

class Link extends Component
{
    protected static string $view = 'ui.link';

    public function __construct(
        public string|null $route = null,
        public mixed $parameters = null,
        public bool|null $absolute = null,
        public bool|null $external = null,
    ) {
    }

    public function url(): ?string
    {
        return filled($this->route)
            ? route($this->route, $this->parameters, $this->absolute)
            : $this->attributes->get('href');
    }

    public function isActive(): bool
    {
        if (filled($this->route) && request()->routeIs($this->route)) {
            return true;
        }

        return ! $this->external && request()->fullUrlIs(
            $this->attributes->get('href')
        );
    }
}
