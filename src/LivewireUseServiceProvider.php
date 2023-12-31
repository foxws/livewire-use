<?php

namespace Foxws\LivewireUse;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Foxws\LivewireUse\Commands\LivewireUseCommand;

class LivewireUseServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('livewire-use')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_livewire-use_table')
            ->hasCommand(LivewireUseCommand::class);
    }
}
