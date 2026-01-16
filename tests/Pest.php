<?php

declare(strict_types=1);

use Wishborn\Cognee\Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure passed to the `uses` function binds the given test case
| class to all test files in the directory. This allows you to use
| Laravel testing helpers in your tests.
|
*/

uses(TestCase::class)->in('Unit', 'Feature');
