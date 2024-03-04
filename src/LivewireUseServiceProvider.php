<?php

namespace Foxws\LivewireUse;

use Foxws\LivewireUse\Commands\InstallCommand;
use Foxws\LivewireUse\Support\Tailwind\Tailwindable;
use Illuminate\Support\Arr;
use Illuminate\View\ComponentAttributeBag;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LivewireUseServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('livewire-use')
            ->hasConfigFile()
            ->hasCommands([
                InstallCommand::class,
            ])
            ->hasViews('app');
    }

    public function packageRegistered(): void
    {
        $this->app->singleton(
            Tailwindable::class,
            fn () => new Tailwindable()
        );
    }

    public function bootingPackage(): void
    {
        $this
            ->registerFeatures()
            ->registerComponents()
            ->registerLivewire()
            ->registerAttributesBagMacros();
    }

    protected function registerFeatures(): static
    {
        foreach ([
            \Foxws\LivewireUse\Support\Livewire\EnumObjects\SupportEnumObjects::class,
            \Foxws\LivewireUse\Support\Livewire\ModelStateObjects\SupportModelStateObjects::class,
            \Foxws\LivewireUse\Support\Livewire\StateObjects\SupportStateObjects::class,
        ] as $feature) {
            app('livewire')->componentHook($feature);
        }

        return $this;
    }

    protected function registerComponents(): static
    {
        if (config('livewire-use.components_enabled') === false) {
            return $this;
        }

        LivewireUse::registerComponents(
            path: __DIR__,
            namespace: 'Foxws\\LivewireUse\\',
            prefix: 'lw-components'
        );

        return $this;
    }

    protected function registerLivewire(): static
    {
        if (config('livewire-use.components_enabled') === false) {
            return $this;
        }

        LivewireUse::registerLivewireComponents(
            path: __DIR__,
            namespace: 'Foxws\\LivewireUse\\',
            prefix: 'lw-livewire'
        );

        return $this;
    }

    protected function registerAttributesBagMacros(): static
    {
        ComponentAttributeBag::macro('twMerge', function (...$keys): ComponentAttributeBag {
            /** @var ComponentAttributeBag $this */
            $instance = app(Tailwindable::class);

            // Append to existing classes
            $attributes = $instance->classAttributes($this)
                ->only($keys)
                ->merge($this->get('class', ''))
                ->flatten()
                ->join(' ');

            $this->offsetSet('class', $attributes);

            return $this->whereDoesntStartWith('class:');
        });

        ComponentAttributeBag::macro('twHas', function (...$keys): bool {
            /** @var ComponentAttributeBag $this */

            $keys = collect($keys)
                ->transform(fn (string $key) => "class:{$key}")
                ->all();

            return $this->has($keys);
        });

        return $this;
    }
}
