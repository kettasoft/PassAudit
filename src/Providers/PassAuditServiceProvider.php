<?php

namespace Kettasoft\PassAudit\Providers;

use Illuminate\Support\ServiceProvider;

class PassAuditServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configure();
    }

    /**
     * Setup the configuration for PassAudit.
     *
     * @return void
     */
    protected function configure()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/passaudit.php', 'passaudit');
    }
}
