<?php

use Foxws\LivewireUse\Actions\Components\Button;
use Illuminate\Support\Facades\View;

it('can render button', function () {
    expect(View::exists(Button::class))
        ->toBeTrue();
});
