<?php

namespace Foxws\LivewireUse\Forms\Components;

use Illuminate\View\View;

class TextInput extends Field
{
    public function render(): View
    {
        return view('tags::card');
    }
}
