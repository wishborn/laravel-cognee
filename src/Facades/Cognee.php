<?php

declare(strict_types=1);

namespace Wishborn\Cognee\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Cognee Facade
 *
 * Provides static access to the CogneeManager instance.
 *
 * @method static \Cognee\Resources\Datasets datasets()
 * @method static \Cognee\Resources\Search search()
 * @method static \Cognee\Resources\Health health()
 * @method static \Cognee\Client client()
 *
 * @see \Wishborn\Cognee\CogneeManager
 */
class Cognee extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'cognee';
    }
}
