<?php

use Foxws\LivewireUse\Tests\Models\Post;
use Foxws\LivewireUse\Tests\TestCase;
use Livewire\Component;
use Livewire\Livewire;

uses(TestCase::class);

beforeEach(function () {
    Livewire::component(EditPost::class);
});

it('can use model route key', function () {
    $post = Post::factory()->create();

    Livewire::test(EditPost::class, $post)
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
