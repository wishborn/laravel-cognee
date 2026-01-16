<?php

declare(strict_types=1);

namespace GlennRaya\Cognee;

use Illuminate\Support\ServiceProvider;

/**
 * CogneeServiceProvider
 *
 * Registers the Cognee package with Laravel, binding the CogneeManager
 * as a singleton and publishing configuration files.
 */
class CogneeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/cognee.php',
            'cognee'
        );

        $this->app->singleton('cognee', function ($app) {
            return new CogneeManager(
                baseUrl: config('cognee.base_url'),
                apiKey: config('cognee.api_key'),
                timeout: config('cognee.timeout'),
                retryAttempts: config('cognee.retry_attempts'),
            );
        });

        $this->app->alias('cognee', CogneeManager::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/cognee.php' => config_path('cognee.php'),
            ], 'cognee-config');
        }
    }
}
