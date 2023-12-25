<?php

namespace FoxWS\LivewireUse\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \FoxWS\LivewireUse\LivewireUse
 */
class LivewireUse extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \FoxWS\LivewireUse\LivewireUse::class;
    }
}
