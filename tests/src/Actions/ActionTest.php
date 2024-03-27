<?php

use Foxws\LivewireUse\Actions\Components\Button;

use function Pest\Livewire\livewire;

it('can be render button', function () {
    livewire(Button::class)
        ->assertViewHas('livewire-use::actions.button');
});
