<?php

namespace Foxws\LivewireUse\Forms\Components;

class Checkbox extends Field
{
    protected static string $view = 'forms.checkbox';

    public function __construct(
        public ?bool $left = null,
    ) {
    }
}
