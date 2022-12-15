<?php

namespace Foxws\LivewireUse\Enums;

enum StepStatus: string
{
    case Previous = 'previous';
    case Current = 'current';
    case Next = 'next';
}
