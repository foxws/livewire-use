<?php

namespace Foxws\LivewireUse\QueryBuilder\Concerns;

trait WithSession
{
    public function mountWithSession(): void
    {
        $this->form->restore();
    }
}
