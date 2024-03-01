<?php

namespace Foxws\LivewireUse\Auth\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

trait WithAuthorization
{
    use AuthorizesRequests;

    public function bootWithAuthorization(): void
    {
        $this->canAccess();
    }

    protected function canAccess(): void
    {
        return;
    }

    protected function canViewAny(mixed $arguments): void
    {
        if ($arguments instanceof Model) {
            $arguments = $arguments->getMorphClass();
        }

        $this->can('viewAny', $arguments);
    }

    protected function canView(mixed $arguments): void
    {
        $this->can('view', $arguments);
    }

    protected function canCreate(mixed $arguments): void
    {
        $this->can('create', $arguments);
    }

    protected function canUpdate(mixed $arguments): void
    {
        $this->can('update', $arguments);
    }

    protected function canDelete(mixed $arguments): void
    {
        $this->can('delete', $arguments);
    }

    protected function can(string $ability, mixed $arguments): void
    {
        $this->authorize($ability, $arguments);
    }
}
