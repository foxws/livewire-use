<?php

namespace Foxws\LivewireUse\Views\Concerns;

trait WithHash
{
    public function hash(): string
    {
        $crc32 = sprintf('%u', crc32(serialize($this)));

        return base_convert($crc32, 10, 36);
    }

    public function classHash(): string
    {
        $crc32 = sprintf('%u', crc32(serialize(static::class)));

        return base_convert($crc32, 10, 36);
    }
}
