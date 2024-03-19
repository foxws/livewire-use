<?php

namespace Foxws\LivewireUse\Forms\Components;

use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\View\View;

class Label extends Component
{
    public function __construct(
        public bool $required = false,
        public string|Htmlable|bool|null $error = null,
        public string|Htmlable|null $hint = null,
    ) {
    }

    public function render(): View
    {
        return view('livewire-use::forms.label');
    }

    public function wireKey(): string
    {
        return $this->attributes->get('for', parent::wireKey());
    }
}
