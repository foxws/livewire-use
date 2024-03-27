<?php

namespace Foxws\LivewireUse\Tests;

use Foxws\LivewireUse\LivewireUseServiceProvider;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            LivewireUseServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('view.paths', [__DIR__.'/resources/views']);
    }
}
