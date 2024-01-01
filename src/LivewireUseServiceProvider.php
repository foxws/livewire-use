<?php

namespace Foxws\LivewireUse;

use Foxws\LivewireUse\Support\Discover\ComponentScout;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Stringable;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\StructureDiscoverer\Data\DiscoveredClass;

class LivewireUseServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('livewire-use')
            ->hasConfigFile()
            ->hasViews();
    }

    public function bootingPackage(): void
    {
        $this
            ->registerComponents();
    }

    protected function registerComponents(): static
    {
        $components = ComponentScout::create()->get();

        collect($components)
            ->each(function (DiscoveredClass $class) {
                $name = str($class->name)
                    ->kebab()
                    ->prepend(static::getComponentPrefix($class));

                Blade::component($class->getFcqn(), $name->value());
            });

        return $this;
    }

    protected static function getComponentPrefix(DiscoveredClass $class): Stringable
    {
        return str($class->namespace)
            ->replaceFirst('Foxws\\LivewireUse', '')
            ->replaceLast('\\Components', '')
            ->replace('\\', '')
            ->kebab()
            ->prepend(config('livewire-use.prefix'))
            ->finish('-');
    }
}
