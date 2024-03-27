<?php

use Foxws\LivewireUse\Tests\Models\Post;
use Foxws\LivewireUse\Tests\TestCase;
use Livewire\Component;

use function Pest\Livewire\livewire;

uses(TestCase::class);

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
