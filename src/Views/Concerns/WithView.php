<?php

namespace Foxws\LivewireUse\Views\Concerns;

use Closure;
use Illuminate\View\View;

trait WithView
{
    protected static string $view;

    protected static array $viewData = [];

    public function render(): View|Closure|string
    {
        return view(
            view: static::getView(),
            data: static::getViewData(),
        );
    }

    protected static function getView(): string
    {
        return str(static::$view)
            ->kebab()
            ->prepend(static::getViewPrefix())
            ->value();
    }

    protected static function getViewData(): array
    {
        return static::$viewData;
    }

    protected static function getViewPrefix(): ?string
    {
        return config('livewire-use.views_prefix');
    }
}
