<?php

namespace Foxws\LivewireUse\Concerns;

use Illuminate\Support\Collection;

trait WithSteps
{
    public Collection $steps;

    public string $step = '';

    public function bootWithSteps(): void
    {
        data_set($this, 'steps', new Collection(), false);
    }
}
