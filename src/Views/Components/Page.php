<?php

namespace Foxws\LivewireUse\Views\Components;

use Foxws\LivewireUse\Views\Concerns\WithAuthentication;
use Foxws\LivewireUse\Views\Concerns\WithAuthorization;
use Foxws\LivewireUse\Views\Concerns\WithSeo;
use Foxws\LivewireUse\Views\Concerns\WithState;
use Illuminate\View\View;
use Livewire\Component;

abstract class Page extends Component
{
    use WithAuthentication;
    use WithAuthorization;
    use WithSeo;

    abstract public function render(): View;
}
