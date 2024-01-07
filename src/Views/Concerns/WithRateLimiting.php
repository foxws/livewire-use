<?php

namespace Foxws\LivewireUse\Views\Concerns;

use Foxws\LivewireUse\Exceptions\TooManyRequestsException;
use Illuminate\Support\Facades\RateLimiter;

trait WithRateLimiting
{
    protected static int $maxAttempts = 0;

    protected static int $decaySeconds = 60;

    protected function rateLimit(): void
    {
        if (static::$maxAttempts < 1) {
            return;
        }

        $key = $this->getRateLimitKey();

        if (RateLimiter::tooManyAttempts($key, static::$maxAttempts)) {
            throw new TooManyRequestsException(
                request()->ip(),
                RateLimiter::availableIn($key)
            );
        }

        $this->hitRateLimiter(static::$decaySeconds);
    }

    protected function hitRateLimiter(): void
    {
        RateLimiter::hit(static::getRateLimitKey(), static::$decaySeconds);
    }

    protected function clearRateLimiter(): void
    {
        RateLimiter::clear(static::getRateLimitKey());
    }

    protected static function getRateLimitKey(): string
    {
        return sha1(
            implode('|', [get_called_class(), request()->ip()])
        );
    }
}
