<?php

namespace Foxws\LivewireUse\Views\Components;

use Foxws\LivewireUse\Views\Concerns;

abstract class Component extends \Illuminate\View\Component
{
    use Concerns\WithHash;
    use Concerns\WithView;
}
