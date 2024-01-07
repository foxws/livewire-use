<?php

namespace Foxws\LivewireUse\Views\Concerns;

use Foxws\LivewireUse\Exceptions\TooManyRequestsException;
use Illuminate\Support\Facades\RateLimiter;

trait WithRateLimit
{
    protected function rateLimit($maxAttempts, $decaySeconds = 60): void
    {
        $key = $this->getRateLimitKey();

        throw_if(
            RateLimiter::tooManyAttempts($key, $maxAttempts),
            TooManyRequestsException::class,
            static::class,
            request()->ip(),
            RateLimiter::availableIn($key)
        );

        $this->hitRateLimiter($decaySeconds);
    }

    protected function hitRateLimiter($decaySeconds = 60): void
    {
        $key = static::getRateLimitKey();

        RateLimiter::hit($key, $decaySeconds);
    }

    protected function clearRateLimiter(): void
    {
        $key = static::getRateLimitKey();

        RateLimiter::clear($key);
    }

    protected static function getRateLimitKey(): string
    {
        return sha1(
            implode('|', [__METHOD__, request()->ip()])
        );
    }
}
