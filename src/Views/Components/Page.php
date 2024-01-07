<?php

namespace Foxws\LivewireUse\Views\Components;

use Foxws\LivewireUse\Views\Concerns;
use Livewire\Component;

abstract class Page extends Component
{
    use Concerns\WithAuthentication;
    use Concerns\WithAuthorization;
    use Concerns\WithHooks;
    use Concerns\WithSeo;
    use Concerns\WithStates;
    use Concerns\WithView;
}
