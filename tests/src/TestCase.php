<?php

namespace Foxws\LivewireUse\Tests;

use Foxws\LivewireUse\LivewireUseServiceProvider;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use WithWorkbench;

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('cache.default', 'file');

        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app['config']->set('view.paths', [__DIR__.'/../resources/views']);
    }

    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            LivewireUseServiceProvider::class,
        ];
    }
}
