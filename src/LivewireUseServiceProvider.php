<?php

namespace Foxws\LivewireUse;

use Foxws\LivewireUse\Support\Blade\Bladeable;
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
            ->hasViews()
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile();
            });
    }

    public function packageRegistered()
    {
        $this->app->singleton(Bladeable::class);
    }

    public function bootingPackage(): void
    {
        $this
            ->registerFeatures()
            ->registerComponents()
            ->registerLivewire()
            ->registerBladeMacros();
    }

    protected function registerFeatures(): static
    {
        foreach ([
            \Foxws\LivewireUse\Support\Livewire\ModelStateObjects\SupportModelStateObjects::class,
            \Foxws\LivewireUse\Support\Livewire\StateObjects\SupportStateObjects::class,
        ] as $feature) {
            app('livewire')->componentHook($feature);
        }

        return $this;
    }

    protected function registerComponents(): static
    {
        if (config('livewire-use.register_components') === false) {
            return $this;
        }

        LivewireUse::registerComponents(
            path: __DIR__,
            namespace: 'Foxws\\LivewireUse\\',
            prefix: config('livewire-use.view_prefix'),
        );

        return $this;
    }

    protected function registerLivewire(): static
    {
        if (config('livewire-use.register_components') === false) {
            return $this;
        }

        LivewireUse::registerLivewireComponents(
            path: __DIR__,
            namespace: 'Foxws\\LivewireUse\\',
            prefix: config('livewire-use.view_prefix'),
        );

        return $this;
    }

    protected function registerBladeMacros(): static
    {
        if (config('livewire-use.register_macros') === false) {
            return $this;
        }

        ComponentAttributeBag::macro('cssClass', function (array $values = []): ComponentAttributeBag {
            /** @var ComponentAttributeBag $this */
            foreach ($values as $key => $value) {
                $key = app(Bladeable::class)->cssClassKey($key)->first();

                if (! $this->has($key)) {
                    $this->offsetSet($key, $value);
                }
            }

            return $this;
        });

        ComponentAttributeBag::macro('classMerge', function (?array $values = null): ComponentAttributeBag {
            /** @var ComponentAttributeBag $this */
            $values ??= str($this->whereStartsWith('class:'))->matchAll('/class:(.*?)\=/s');

            $classList = collect($values)
                ->map(function (mixed $value, int|string $key) {
                    if (is_bool($value) && $value === false) {
                        return;
                    }

                    $key = app(Bladeable::class)->cssClassKey(
                        is_numeric($key) ? $value : $key
                    );

                    return $this->get($key->first(), '');
                })
                ->merge($this->get('class'))
                ->join(' ');

            $this->offsetSet('class', $classList);

            return $this
                ->classSort()
                ->classWithout();
        });

        ComponentAttributeBag::macro('classFor', function (string $key, ?string $default = null): ComponentAttributeBag {
            /** @var ComponentAttributeBag $this */
            $value = $this->get(app(Bladeable::class)->cssClassKey($key)->first(), $default ?? '');

            $this->offsetSet('class', $value);

            return $this
                ->classSort()
                ->classWithout();
        });

        ComponentAttributeBag::macro('classAny', function (...$keys): ComponentAttributeBag {
            /** @var ComponentAttributeBag $this */
            $value = $this->only(app(Bladeable::class)->cssClassKey($keys));

            $this->offsetSet('class', $value->join(' '));

            return $this
                ->classSort()
                ->classWithout();
        });

        ComponentAttributeBag::macro('classSort', function (): ComponentAttributeBag {
            /** @var ComponentAttributeBag $this */
            $classList = app(Bladeable::class)->classSort(
                $this->get('class', '')
            );

            $this->offsetSet('class', $classList);

            return $this;
        });

        ComponentAttributeBag::macro('classWithout', function (): ComponentAttributeBag {
            /** @var ComponentAttributeBag $this */

            return $this
                ->whereDoesntStartWith('class:');
        });

        return $this;
    }
}
