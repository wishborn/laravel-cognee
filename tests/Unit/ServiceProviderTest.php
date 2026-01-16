<?php

declare(strict_types=1);

use GlennRaya\Cognee\CogneeManager;

/**
 * Tests for the CogneeServiceProvider registration.
 */

it('registers the cognee manager as a singleton', function () {
    $manager1 = app('cognee');
    $manager2 = app('cognee');

    expect($manager1)->toBeInstanceOf(CogneeManager::class);
    expect($manager1)->toBe($manager2);
});

it('registers the manager with class binding', function () {
    $manager = app(CogneeManager::class);

    expect($manager)->toBeInstanceOf(CogneeManager::class);
});

it('can resolve manager via facade', function () {
    $manager = \GlennRaya\Cognee\Facades\Cognee::getFacadeRoot();

    expect($manager)->toBeInstanceOf(CogneeManager::class);
});
