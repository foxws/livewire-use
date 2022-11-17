<?php

namespace Foxws\LivewireUse\Concerns;

use DateTimeZone;
use Illuminate\Support\Carbon;

trait WithCarbon
{
    protected function localTimezone(string $value = 'now'): Carbon
    {
        return Carbon::parse($value)->setTimezone(config('app.timezone'));
    }

    protected function userTimezone(string $value = 'now'): Carbon
    {
        $carbon = $this->localTimezone($value);

        return $carbon->setTimezone($this->getDateTimeZone());
    }

    protected function getDateTimeZone(): DateTimeZone
    {
        return new DateTimeZone(
            auth()->user()?->timezone ?: config('app.timezone')
        );
    }

    protected function dateFormat(?string $value = null, string $format = DATE_ATOM): ?string
    {
        if (! $value) {
            return null;
        }

        return Carbon::parse($value)->format($format);
    }

    protected function localFormat(?string $value = null, string $format = DATE_ATOM): ?string
    {
        if (! $value) {
            return null;
        }

        return $this->localTimezone($value)->format($format);
    }

    protected function timezoneFormat(?string $value = null, string $format = DATE_ATOM): ?string
    {
        if (! $value) {
            return null;
        }

        return $this->userTimezone($value)->format($format);
    }
}
