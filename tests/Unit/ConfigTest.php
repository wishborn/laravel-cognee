<?php

declare(strict_types=1);

/**
 * Tests for configuration loading and default values.
 */

it('loads default configuration values', function () {
    expect(config('cognee.base_url'))->toBe('http://localhost:8000');
    expect(config('cognee.api_key'))->toBe('test-api-key');
    expect(config('cognee.timeout'))->toBe(30);
    expect(config('cognee.retry_attempts'))->toBe(3);
});

it('can override configuration values', function () {
    config(['cognee.base_url' => 'http://custom:9000']);
    config(['cognee.timeout' => 60]);

    expect(config('cognee.base_url'))->toBe('http://custom:9000');
    expect(config('cognee.timeout'))->toBe(60);
});
