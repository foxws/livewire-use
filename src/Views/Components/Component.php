<?php

namespace Foxws\LivewireUse\Views\Components;

use Foxws\LivewireUse\Views\Concerns;

abstract class Component extends \Illuminate\View\Component
{
    use Concerns\WithActions;
    use Concerns\WithHash;
    use Concerns\WithId;
    use Concerns\WithView;
}
