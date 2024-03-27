<?php

namespace Foxws\LivewireUse\Tests\TestClasses;

use Foxws\LivewireUse\Tests\Models\Post;
use Livewire\Component;

class LivewireComponent extends Component
{
    public Post $post;

    public function render()
    {
        return <<<'HTML'
        <div>
            {{-- wow, such a great form here --}}
        </div>
        HTML;
    }
}
