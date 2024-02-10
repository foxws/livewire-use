<?php

namespace Foxws\LivewireUse\Views\Components;

use Foxws\LivewireUse\Auth\Concerns\WithAuthentication;
use Foxws\LivewireUse\Auth\Concerns\WithAuthorization;
use Foxws\LivewireUse\States\Concerns\WithStates;
use Foxws\LivewireUse\Support\Concerns\WithHooks;
use Foxws\LivewireUse\Views\Concerns\WithSeo;
use Foxws\LivewireUse\Views\Concerns\WithView;
use Livewire\Component;

abstract class Page extends Component
{
    use WithAuthentication;
    use WithAuthorization;
    use WithHooks;
    use WithSeo;
    use WithStates;
    use WithView;
}
