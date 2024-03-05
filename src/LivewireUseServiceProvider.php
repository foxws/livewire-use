<?php

namespace Foxws\LivewireUse;

use Foxws\LivewireUse\Support\Blade\Tailwind;
use Illuminate\Support\Arr;
use Illuminate\View\ComponentAttributeBag;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LivewireUseServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('livewire-use')
            ->hasConfigFile()
            ->hasViews('app')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile();
            });
    }

    public function packageRegistered()
    {
        $this->app->singleton(Tailwind::class);
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
        ComponentAttributeBag::macro('twClass', function (array|string $values = []): ComponentAttributeBag {
            /** @var ComponentAttributeBag $this */
            $values = Arr::wrap($values);

            foreach ($values as $key => $value) {
                $key = app(Tailwind::class)->classKey($key);

                if ($this->has($key)) {
                    continue;
                }

                $this->offsetSet($key, $value);
            }

            return $this;
        });

        ComponentAttributeBag::macro('twFor', function (string $key, ?string $default = null): ComponentAttributeBag {
            /** @var ComponentAttributeBag $this */
            $instance = app(Tailwind::class);

            $value = $this->get($instance->classKey($key), $default);

            $this->offsetSet('class', $value);

            return $this
                ->twSort()
                ->twMergeWithout();
        });

        ComponentAttributeBag::macro('twMerge', function (array|string|null $values = null): ComponentAttributeBag {
            /** @var ComponentAttributeBag $this */
            $instance = app(Tailwind::class);

            $values ??= $instance->classAttributes($this->whereStartsWith('class:'));

            $values = Arr::wrap($values);

            $classList = collect($values)
                ->map(function (mixed $value, int|string $key) use ($instance) {
                    if (is_bool($value) && $value === false) {
                        return;
                    }

                    $key = is_numeric($key) ? $value : $key;

                    $key = $instance->classKey($key);

                    return $this->get($key, '');
                })
                ->merge($this->get('class'))
                ->join(' ');

            $this->offsetSet('class', $classList);

            return $this
                ->twSort()
                ->twMergeWithout();
        });

        ComponentAttributeBag::macro('twSort', function (): ComponentAttributeBag {
            /** @var ComponentAttributeBag $this */
            $this->offsetSet('class', app(Tailwind::class)->classSort(
                $this->get('class')
            ));

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
