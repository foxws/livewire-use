<?php

namespace Foxws\LivewireUse\Forms\Components;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\View\View;

class Label extends Field
{
    protected static string $view = 'forms.label';

    public function __construct(
        public string|Htmlable|null $label = null,
        public bool $inline = false,
    ) {
    }

    public function render(): View
    {
        return view(static::$view);
    }
}
