<?php

declare(strict_types=1);

namespace GlennRaya\Cognee;

use Cognee\Client;
use Cognee\Config;
use Cognee\Resources\Datasets;
use Cognee\Resources\Health;
use Cognee\Resources\Search;

/**
 * CogneeManager
 *
 * Main manager class that wraps the Cognee SDK client and provides
 * a Laravel-friendly API for interacting with Cognee services.
 */
class CogneeManager
{
    /**
     * The underlying Cognee SDK client instance.
     */
    protected Client $client;

    /**
     * Create a new CogneeManager instance.
     *
     * Initializes the SDK client with the provided configuration values.
     */
    public function __construct(
        string $baseUrl,
        string $apiKey,
        int $timeout = 30,
        int $retryAttempts = 3,
    ) {
        $config = new Config(
            baseUrl: $baseUrl,
            apiKey: $apiKey,
            timeout: $timeout,
            retryAttempts: $retryAttempts,
        );

        $this->client = new Client($config);
    }

    /**
     * Get the datasets resource for dataset operations.
     *
     * Provides access to create, list, delete datasets and add data.
     */
    public function datasets(): Datasets
    {
        return $this->client->datasets();
    }

    /**
     * Get the search resource for search operations.
     *
     * Provides access to semantic, keyword, and hybrid search.
     */
    public function search(): Search
    {
        return $this->client->search();
    }

    /**
     * Get the health resource for health checks.
     *
     * Provides access to basic and detailed health checks.
     */
    public function health(): Health
    {
        return $this->client->health();
    }

    /**
     * Get the underlying SDK client for advanced operations.
     *
     * Use this when you need direct access to SDK methods not
     * exposed through the manager's convenience methods.
     */
    public function client(): Client
    {
        return $this->client;
    }
}
