<?php

namespace Foxws\LivewireUse\Views\Concerns;

use Illuminate\Support\Facades\RateLimiter;

/**
 * @property string $model
 * @property ?int $limit
 */
trait WithRateLimit
{
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
