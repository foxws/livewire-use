<?php

namespace Foxws\LivewireUse;

use Foxws\LivewireUse\Support\ComponentScout;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\StructureDiscoverer\Data\DiscoveredClass;

class LivewireUseServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('livewire-use')
            ->hasConfigFile();
    }

    public function bootingPackage(): void
    {
        $this
            ->registerComponents()
            ->registerViews();
    }

    protected function registerComponents(): static
    {
        $components = ComponentScout::create()->get();

        collect($components)
            ->each(function (DiscoveredClass $class) {
                $prefix = str($class->namespace)
                    ->replaceFirst('Foxws\\LivewireUse', '')
                    ->replaceLast('\\Components', '')
                    ->replace('\\', '')
                    ->kebab()
                    ->prepend(config('livewire-use.prefix', 'lw-'));

                $name = str($class->name)
                    ->kebab()
                    ->prepend("{$prefix}::");

                Blade::component($class->getFcqn(), $name->value());
            });

        return $this;
    }

    protected function registerViews(): static
    {
        $paths = collect(File::directories(__DIR__));

        $paths->each(function (string $path) {
            $fullPath = "$path/Views";

            $prefix = str($path)
                ->basename()
                ->kebab()
                ->prepend(config('livewire-use.prefix', 'lw-'))
                ->value();

            $this->loadViewsFrom(
                path: $fullPath,
                namespace: $prefix,
            );

            Blade::anonymousComponentNamespace(
                directory: $fullPath,
                prefix: $prefix,
            );
        });

        return $this;
    }
}
