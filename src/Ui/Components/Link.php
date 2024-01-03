<?php

namespace Foxws\LivewireUse\Ui\Components;

use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\Contracts\Support\Htmlable;

class Link extends Component
{
    protected static string $view = 'ui.link';

    public function __construct(
        public string|Htmlable|null $label = null,
        public string|Htmlable|null $prepend = null,
        public string|Htmlable|null $append = null,
        public ?string $route = null,
        public ?array $parameters = null,
        public ?bool $absolute = null,
        public ?bool $external = null,
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
