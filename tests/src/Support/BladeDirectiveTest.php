<?php

use Foxws\LivewireUse\Tests\TestCase;
use Illuminate\Support\Facades\Blade;

uses(TestCase::class);

it('provides a blade directive to merge tailwind classes', function () {
    expect(Blade::render('<x-livewire-use::actions-button />'))
        ->toContain('class="w-10 h-10 rounded-full bg-blue-500"')
        ->toMatchSnapshot();
});
