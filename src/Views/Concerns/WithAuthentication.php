<?php

namespace Foxws\LivewireUse\Views\Concerns;

use Illuminate\Foundation\Auth\User;

trait WithAuthentication
{
    protected function isAuthenticated(): bool
    {
        return auth()->check();
    }

    protected function getAuthUser(): ?User
    {
        return auth()->user();
    }

    protected function getAuthId(): ?string
    {
        return auth()->id();
    }
}
