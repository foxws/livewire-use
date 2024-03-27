<?php

use Foxws\LivewireUse\Support\Livewire\Models\ModelSynth;
use Foxws\LivewireUse\Tests\Models\Post;
use Foxws\LivewireUse\Tests\TestCase;
use Foxws\LivewireUse\Tests\TestClasses\LivewireComponent;
use Livewire\Livewire;

uses(TestCase::class);

beforeEach(function () {
    Livewire::propertySynthesizer(ModelSynth::class);
});

it('can overrule model synthesizer', function () {
    $post = Post::factory()->create();

    Livewire::test(LivewireComponent::class, compact('post'))
        ->assertStatus(200);
});
