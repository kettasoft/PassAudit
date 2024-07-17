<?php

namespace Kettasoft\PassAudit\Tests;

use PassAudit\Tests\Models\User;
use Orchestra\Testbench\TestCase as Orchestra;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Factory;
use Kettasoft\PassAudit\Providers\PassAuditServiceProvider;

abstract class TestCase extends Orchestra
{
    use RefreshDatabase;
    /**
     * Setup DB before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->getEnvironmentSetUp($this->app);

        $this->loadMigrationsFrom([
            '--path' => realpath(__DIR__ . '/database/migrations'),
        ]);

        $this->artisan('migrate', [
            '--path' => realpath(__DIR__ . '/database/migrations'),
        ]);

        $this->guessFactoryNamesUsing();
    }

    protected function guessFactoryNamesUsing()
    {
        return Factory::guessFactoryNamesUsing(fn ($name) => (string) '\Kettasoft\PassAudit\Tests\Database\Factories\\' . (class_basename($name)) . 'Factory');
    }

    protected function getPackageProviders($app)
    {
        return [
            PassAuditServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    protected function getPackageAliases($app)
    {
        return [
            // 'PassAudit' => GatekeeperFacade::class,
        ];
    }
}
