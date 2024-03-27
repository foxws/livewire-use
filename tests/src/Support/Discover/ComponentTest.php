<?php

use Foxws\LivewireUse\Actions\Components\Button;

it('can render button', function () {
    expect(view()->exists(Button::class))
        ->toBeTrue();
});
