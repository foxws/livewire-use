<?php

namespace Foxws\LivewireUse\Concerns;

use Illuminate\Contracts\Auth\Authenticatable;

trait WithAuthentication
{
    protected function getAuthUser(): Authenticatable
    {
        return auth()->user();
    }
}
