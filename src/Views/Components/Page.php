<?php

namespace Foxws\LivewireUse\Views\Components;

use Foxws\LivewireUse\Views\Concerns;
use Illuminate\View\View;
use Livewire\Component;

abstract class Page extends Component
{
    use Concerns\WithAuthentication;
    use Concerns\WithAuthorization;
    use Concerns\WithHooks;
    use Concerns\WithSeo;
    use Concerns\WithStates;

    abstract public function render(): View;
}
