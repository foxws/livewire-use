<?php

namespace Foxws\LivewireUse\Views\Components;

use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\View\View;
use Livewire\Component;

abstract class Page extends Component
{
    use SEOTools;

    abstract public function render(): View;
}
