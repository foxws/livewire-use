<?php

namespace Foxws\LivewireUse\Actions\Components;

use Foxws\LivewireUse\Views\Concerns\WithHash;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\View\Component;
use Illuminate\View\View;

class Dropdown extends Component
{
    use WithHash;

    public function __construct(
        public string|Htmlable|null $actions = null,
    ) {
    }

    public function render(): View
    {
        return view('livewire-use::actions.dropdown');
    }
}
