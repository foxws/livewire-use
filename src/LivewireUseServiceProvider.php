<?php

namespace Foxws\LivewireUse;

use Closure;
use Foxws\LivewireUse\Commands\InstallCommand;
use Foxws\LivewireUse\Support\Tailwind\Tailwindable;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
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
        ComponentAttributeBag::macro('twClass', function (array $values = []): ComponentAttributeBag {
            /** @var ComponentAttributeBag $this */

            foreach ($values as $key => $value) {
                $this->offsetSet("class:{$key}", $value);
            }

            return $this;
        });

        ComponentAttributeBag::macro('twMerge', function (array $values = []): ComponentAttributeBag {
            /** @var ComponentAttributeBag $this */

            $keys = collect($values)
                ->map(function (mixed $value, int|string $key) {
                    $key = is_numeric($key) ? $value : $key;

                    if (is_bool($value) && $value === false) {
                        return;
                    }

                    return $this->get("class:{$key}");
                })
                ->merge($this->get('class', []))
                ->join(' ');

            $this->offsetSet('class', $keys);

            return $this->twMergeWithout();
        });

        ComponentAttributeBag::macro('twMergeWithout', function (): ComponentAttributeBag {
            /** @var ComponentAttributeBag $this */
            return $this->whereDoesntStartWith('class:');
        });

        ComponentAttributeBag::macro('twHas', function (...$keys): bool {
            /** @var ComponentAttributeBag $this */
            $keys = collect($keys)
                ->transform(fn (string $key) => "class:{$key}")
                ->all();

            return $this->has($keys);
        });

        ComponentAttributeBag::macro('twHasAny', function (...$keys): bool {
            /** @var ComponentAttributeBag $this */
            $keys = collect($keys)
                ->transform(fn (string $key) => "class:{$key}")
                ->all();

            return $this->hasAny($keys);
        });

        return $this;
    }
}
