<?php

/**
 * Cognee Configuration
 *
 * This file contains the configuration options for the Laravel Cognee package.
 * These settings control how the package connects to and interacts with
 * your Cognee instance.
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Cognee Base URL
    |--------------------------------------------------------------------------
    |
    | The base URL of your Cognee instance. This should be the full URL
    | including the protocol (http/https) but without a trailing slash.
    |
    */
    'base_url' => env('COGNEE_BASE_URL', 'http://localhost:8000'),

    /*
    |--------------------------------------------------------------------------
    | API Key
    |--------------------------------------------------------------------------
    |
    | Your Cognee API key for authentication. This key is required for
    | all API operations.
    |
    */
    'api_key' => env('COGNEE_API_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Request Timeout
    |--------------------------------------------------------------------------
    |
    | The maximum number of seconds to wait for a response from the
    | Cognee API before timing out.
    |
    */
    'timeout' => env('COGNEE_TIMEOUT', 30),

    /*
    |--------------------------------------------------------------------------
    | Retry Attempts
    |--------------------------------------------------------------------------
    |
    | The number of times to retry a failed request before giving up.
    | Set to 0 to disable retries.
    |
    */
    'retry_attempts' => env('COGNEE_RETRY_ATTEMPTS', 3),
];
