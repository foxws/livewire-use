<?php

use Foxws\LivewireUse\Tests\Models\Post;
use Livewire\Component;

use function Pest\Livewire\livewire;

it('can use model route key', function () {
    $post = Post::factory()->create();

    livewire(PostEditForm::class, compact('post'))
        ->call('getRouteKey')
        ->assertSee($post->getRouteKey());
});

class PostEditForm extends Component
{
    public Post $post;

    public function getRouteKey(): string
    {
        return $this->post->getRouteKey();
    }
}
