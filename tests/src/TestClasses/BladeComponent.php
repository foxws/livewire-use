<?php

namespace Foxws\LivewireUse\Tests\TestClasses;

use Illuminate\View\Component;

class BladeComponent extends Component
{
    public function render(): string
    {
        return <<<'blade'
        <div {{ $attributes
            ->cssClass([
                'layer' => 'flex flex-nowrap',
                'color' => 'bg-gray-300 opacity-50',
            ])
            ->classMerge()
        }}>
            Blade Component
        </div>
        blade;
    }
}
