<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;
use Vormkracht10\TrailingSlash\Middleware\EnsureUrlsWithoutTrailingSlash;

it('can access root url', function () {
    Route::get('/', fn () => 'Hello World');
    Route::get('route-without-trailing-slash', fn () => 'Hello World');

    $this->get('/')->assertOk();
});

it('ensure url is with trailing slash', function () {
    $request = Request::create('/without-trailing-slash');

    $next = function () {
        return response('This is a secret place');
    };

    $middleware = new \Vormkracht10\TrailingSlash\Middleware\EnsureUrlsWithTrailingSlash();
    $response = $middleware->handle($request, $next);

    $this->assertEquals(Response::HTTP_MOVED_PERMANENTLY, $response->getStatusCode());

    $request = Request::create('/with-trailing-slash/');

    $next = function () {
        return response('This is a secret place');
    };

    $middleware = new \Vormkracht10\TrailingSlash\Middleware\EnsureUrlsWithTrailingSlash();
    $response = $middleware->handle($request, $next);

    $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
});

it('ensure url is without trailing slash', function () {
    Route::get('/with-trailing-slash', fn () => '');

    $this->withMiddleware(
        EnsureUrlsWithoutTrailingSlash::class,
    )->get('/with-trailing-slash/')
        ->assertMovedPermanently();
});
