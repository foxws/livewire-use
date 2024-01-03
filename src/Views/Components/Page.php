<?php

namespace Foxws\LivewireUse\Views\Components;

use Foxws\LivewireUse\Views\Concerns\WithAuthentication;
use Foxws\LivewireUse\Views\Concerns\WithAuthorization;
use Foxws\LivewireUse\Views\Concerns\WithSeo;
use Illuminate\View\View;
use Livewire\Component;

abstract class Page extends Component
{
    use WithAuthorization;
    use WithAuthentication;
    use WithSeo;

    abstract public function render(): View;
}
