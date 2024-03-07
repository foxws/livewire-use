<?php

namespace Foxws\LivewireUse\Views\Components;

use Foxws\LivewireUse\Views\Concerns\WithHash;
use Foxws\LivewireUse\Views\Concerns\WithLivewire;
use Foxws\LivewireUse\Views\Concerns\WithView;
use Illuminate\View\Component as BaseComponent;

abstract class Component extends BaseComponent
{
    use WithHash;
    use WithLivewire;
    use WithView;
}
