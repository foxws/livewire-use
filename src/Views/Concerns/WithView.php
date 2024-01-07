<?php

namespace Foxws\LivewireUse\Views\Concerns;

use Illuminate\View\View;

trait WithView
{
    protected static string $view;

    protected static ?array $viewData = null;

    public function render(): View
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
            ->prepend(config('livewire-use.views_prefix'))
            ->value();
    }

    protected static function getViewData(): array
    {
        return static::$viewData ?? [];
    }
}
