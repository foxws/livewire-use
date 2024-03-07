<?php

namespace Foxws\LivewireUse\Navigation\Components;

use Foxws\LivewireUse\Views\Components\Component;
use Illuminate\Contracts\Support\Htmlable;

class Navbar extends Component
{
    protected static string $view = 'navigation.navbar';

    public function __construct(
        public string|Htmlable|null $start = null,
        public string|Htmlable|null $end = null,
    ) {
    }
}
