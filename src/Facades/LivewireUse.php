<?php

namespace Foxws\LivewireUse\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Foxws\LivewireUse\LivewireUse
 */
class LivewireUse extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Foxws\LivewireUse\LivewireUse::class;
    }
}
