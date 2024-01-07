<?php

namespace Foxws\LivewireUse\Exceptions;

use Exception;

class TooManyRequestsException extends Exception
{
    public $minutesUntilAvailable;

    public function __construct(
        public string $method,
        public string $ip,
        public int $secondsUntilAvailable,
    ) {
        $this->minutesUntilAvailable = ceil($this->secondsUntilAvailable / 60);

        parent::__construct(sprintf(
            'Too many requests from [%s] to method [%s] on component: [%s]. Retry in %d seconds.',
            $this->ip,
            $this->method,
            $this->secondsUntilAvailable,
        ));
    }
}
