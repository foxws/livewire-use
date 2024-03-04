<?php

namespace Foxws\LivewireUse;

use Foxws\LivewireUse\Commands\InstallCommand;
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

    public function bootingPackage(): void
    {
        $this
            ->registerFeatures()
            ->registerComponents()
            ->registerLivewire()
            ->registerBladeMacros()
            ->registerBladeDirectives();
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

    protected function registerBladeMacros(): static
    {
        ComponentAttributeBag::macro('twClass', function (array $values = []): ComponentAttributeBag {
            /** @var ComponentAttributeBag $this */
            foreach ($values as $key => $value) {
                if ($this->has("class:{$key}")) {
                    continue;
                }

                $this->offsetSet("class:{$key}", $value);
            }

            return $this;
        });

        ComponentAttributeBag::macro('twMerge', function (array $values = []): ComponentAttributeBag {
            /** @var ComponentAttributeBag $this */
            $classList = collect($values)
                ->map(function (mixed $value, int|string $key) {
                    $key = is_numeric($key) ? $value : $key;

                    if (is_bool($value) && $value === false) {
                        return;
                    }

                    return $this->get("class:{$key}");
                })
                ->merge($this->get('class', ''))
                ->join(' ');

            $this->offsetSet('class', $classList);

            return $this
                ->twSort()
                ->twMergeWithout();
        });

        ComponentAttributeBag::macro('twSort', function (): ComponentAttributeBag {
            /** @var ComponentAttributeBag $this */
            $this->offsetSet('class', str($this->get('class'))
                ->squish()
                ->split('/[\s,]+/')
                ->sort(fn (string $value) => str($value)->startsWith('!'))
                ->join(' '));

            return $this;
        });

        ComponentAttributeBag::macro('twMergeWithout', function (): ComponentAttributeBag {
            /** @var ComponentAttributeBag $this */
            return $this->whereDoesntStartWith('class:');
        });

        return $this;
    }

    protected function registerBladeDirectives(): static
    {
        //

        return $this;
    }
}
