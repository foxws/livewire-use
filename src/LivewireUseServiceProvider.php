<?php

namespace Foxws\LivewireUse;

use Foxws\LivewireUse\Support\Discover\ComponentScout;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Stringable;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LivewireUseServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('livewire-use')
            ->hasConfigFile()
            ->hasViews();
    }
}
