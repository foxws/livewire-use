<?php

namespace Foxws\LivewireUse\Views\Components;

use Foxws\LivewireUse\Views\Concerns\WithHash;
use Foxws\LivewireUse\Views\Concerns\WithModel;
use Illuminate\View\Component as BaseComponent;

abstract class Component extends BaseComponent
{
    use WithHash;
    use WithModel;
}
