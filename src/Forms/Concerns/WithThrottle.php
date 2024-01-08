<?php

namespace Foxws\LivewireUse\Forms\Concerns;

use Foxws\LivewireUse\Exceptions\RateLimitedException;
use Foxws\LivewireUse\Views\Concerns\WithRateLimiting;

trait WithThrottle
{
    use WithRateLimiting;

    protected function handleThrottle(RateLimitedException $e): void
    {
        $field = $this->getThrottleModel();

        $this->resetErrorBag($field);

        $this->addError($field, __('Please retry in :seconds seconds', [
            'seconds' => $e->seconds ?? 0,
        ]));
    }

    protected function getThrottleModel(): string
    {
        $fields = array_keys($this->all());

        return $fields[0] ?? 'throttled';
    }
}
