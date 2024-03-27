<?php

use Foxws\LivewireUse\Support\Livewire\Models\ModelSynth;
use Foxws\LivewireUse\Tests\Models\Post;
use Foxws\LivewireUse\Tests\TestCase;
use Foxws\LivewireUse\Tests\TestClasses\EditPost;
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

