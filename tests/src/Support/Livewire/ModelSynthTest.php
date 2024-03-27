<?php

use Foxws\LivewireUse\Support\Livewire\Models\ModelSynth;
use Foxws\LivewireUse\Tests\Models\Post;
use Foxws\LivewireUse\Tests\TestCase;
use Livewire\Component;
use Livewire\Livewire;

uses(TestCase::class);

beforeEach(function () {
    Livewire::propertySynthesizer(ModelSynth::class);
    Livewire::component(EditPost::class);
});

it('can overrule model synthesizer', function () {
    $post = Post::factory()->create();

    Livewire::test(EditPost::class, compact('post'))
        ->assertStatus(200);
});

class EditPost extends Component
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
