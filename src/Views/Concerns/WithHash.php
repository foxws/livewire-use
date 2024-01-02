<?php

namespace Foxws\LivewireUse\Views\Concerns;

trait WithHash
{
    public function hash(): string
    {
        $crc32 = crc32(serialize($this));

        return printf('%u', $crc32);
    }

    public function fingerprint(): string
    {
        $class = str_split(static::class);

        $crc32 = crc32(serialize($class));

        return base_convert($crc32, 10, 36);
    }
}
