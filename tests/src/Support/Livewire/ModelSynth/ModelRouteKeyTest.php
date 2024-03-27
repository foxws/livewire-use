<?php

use Foxws\LivewireUse\Tests\Models\Post;
use Foxws\LivewireUse\Tests\TestCase;
use Livewire\Component;
use Livewire\Livewire;

uses(TestCase::class);

beforeEach(function () {
    Livewire::component(PostEditForm::class);
});

it('can use model route key', function () {
    $post = Post::factory()->create();

    Livewire::test(PostEditForm::class, compact('post'))
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
