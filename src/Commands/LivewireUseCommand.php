<?php

namespace Foxws\LivewireUse\Commands;

use Illuminate\Console\Command;

class LivewireUseCommand extends Command
{
    public $signature = 'livewire-use';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
