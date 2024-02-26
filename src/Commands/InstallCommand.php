<?php

namespace Foxws\LivewireUse\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    public $signature = 'lw:install';

    public $description = 'Installs LivewireUse';

    public function handle(): int
    {
        $this->call('structure-scouts:clear');

        return self::SUCCESS;
    }
}
