<?php

namespace Foxws\LivewireUse\Support\Concerns;

use Foxws\LivewireUse\Exceptions\RateLimitedException;
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
            throw new RateLimitedException(
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
        return hash('crc32c', serialize([
            get_called_class(), request()->ip(),
        ]));
    }
}
