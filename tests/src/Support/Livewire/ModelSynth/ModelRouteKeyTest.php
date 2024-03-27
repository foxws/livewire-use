<?php

use Foxws\LivewireUse\Tests\Models\Post;
use Foxws\LivewireUse\Tests\TestCase;
use Livewire\Component;
use Livewire\Livewire;

use function Pest\Livewire\livewire;

uses(TestCase::class);

beforeEach(function () {
    Livewire::component(PostEditForm::class);
});

it('can use model route key', function () {
    $post = Post::factory()->create();

    livewire(PostEditForm::class, compact('post'))
        ->call('getRouteKey')
        ->assertSee($post->getRouteKey());
});

class PostEditForm extends Component
{
    public Post $post;

    public function render()
    {
        return <<<'HTML'
        <div>
            {{-- Your Blade template goes here... --}}
        </div>
        HTML;
    }

    public function getRouteKey(): string
    {
        return $this->post->getRouteKey();
    }
}
