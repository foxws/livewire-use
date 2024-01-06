<?php

namespace Foxws\LivewireUse\Views\Components;

use Foxws\LivewireUse\Support\StateObjects\WithStates;
use Foxws\LivewireUse\Views\Concerns\WithAuthentication;
use Foxws\LivewireUse\Views\Concerns\WithAuthorization;
use Foxws\LivewireUse\Views\Concerns\WithHooks;
use Foxws\LivewireUse\Views\Concerns\WithSeo;
use Illuminate\View\View;
use Livewire\Component;

abstract class Page extends Component
{
    use WithAuthentication;
    use WithAuthorization;
    use WithHooks;
    use WithSeo;
    use WithStates;

    abstract public function render(): View;
}
