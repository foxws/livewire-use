<?php

namespace Foxws\LivewireUse\Forms\Concerns;

use Foxws\LivewireUse\Exceptions\TooManyRequestsException;
use Foxws\LivewireUse\Views\Concerns\WithRateLimiting;

trait WithThrottle
{
    use WithRateLimiting;

    protected function handleThrottle(TooManyRequestsException $e): void
    {
        $field = $this->getThrottleModel();

        $this->resetErrorBag($field);

        $this->addError($field, __('Please retry in :seconds seconds', [
            'seconds' => $e->secondsUntilAvailable ?? 0
        ]));
    }

    protected function getThrottleModel(): string
    {
        $fields = array_keys($this->all());

        return $fields[0] ?? 'throttled';
    }
}
