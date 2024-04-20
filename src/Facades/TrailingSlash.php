<?php

namespace Vormkracht10\TrailingSlash\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Vormkracht10\TrailingSlash\TrailingSlash
 */
class TrailingSlash extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Vormkracht10\TrailingSlash\TrailingSlash::class;
    }
}
