<?php

namespace Foxws\LivewireUse\Views\Concerns;

trait WithHash
{
    public function hash(): string
    {
        $value = crc32(serialize($this));

        return printf('%u', $value);
    }
}
