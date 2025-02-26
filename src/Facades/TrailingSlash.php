<?php

namespace Backstage\TrailingSlash\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Backstage\TrailingSlash\TrailingSlash
 */
class TrailingSlash extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Backstage\TrailingSlash\TrailingSlash::class;
    }
}
