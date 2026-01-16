<?php

declare(strict_types=1);

namespace GlennRaya\Cognee\Tests;

use GlennRaya\Cognee\CogneeServiceProvider;
use GlennRaya\Cognee\Facades\Cognee;
use Orchestra\Testbench\TestCase as Orchestra;

/**
 * Base TestCase for package tests.
 *
 * Extends Orchestra Testbench to provide a simulated Laravel
 * environment for testing the package.
 */
abstract class TestCase extends Orchestra
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            CogneeServiceProvider::class,
        ];
    }

    /**
     * Get package aliases.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<string, class-string>
     */
    protected function getPackageAliases($app): array
    {
        return [
            'Cognee' => Cognee::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function defineEnvironment($app): void
    {
        $app['config']->set('cognee.base_url', 'http://localhost:8000');
        $app['config']->set('cognee.api_key', 'test-api-key');
        $app['config']->set('cognee.timeout', 30);
        $app['config']->set('cognee.retry_attempts', 3);
    }
}
