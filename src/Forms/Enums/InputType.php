<?php

namespace Foxws\LivewireUse\Forms\Enums;

use Foxws\LivewireUse\Forms\Components\Checkbox;
use Foxws\LivewireUse\Forms\Components\Input;

enum InputType: string
{
    case Text = 'text';
    case Checkbox = 'checkbox';
    case Radio = 'radio';
    case Textarea = 'textarea';

    public function component(): string
    {
        return match ($this) {
            InputType::Checkbox => Checkbox::class,
            default => Input::class,
        };
    }
}
