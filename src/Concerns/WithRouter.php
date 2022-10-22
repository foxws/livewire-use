<?php

namespace Foxws\LivewireUse\Concerns;

use Foxws\LivewireUse\Support\Attributes;
use Illuminate\Support\Facades\Route;

trait WithRouter
{
    public Attributes $route;

    public function bootWithRouter(): void
    {
        $this->setRouteParameters();
    }

    public function bootedWithRouter(): void
    {
        $this->setRouteParameters();
    }

    protected function getRouteParameters(): array
    {
        return Route::current()->parameters;
    }

    protected function setRouteParameters(): void
    {
        data_set(
            target: $this,
            key: 'route',
            value: new Attributes($this->getRouteParameters()),
        );
    }
}
