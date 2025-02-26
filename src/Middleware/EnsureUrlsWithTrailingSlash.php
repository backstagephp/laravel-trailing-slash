<?php

namespace Backstage\TrailingSlash\Middleware;

use Closure;

class EnsureUrlsWithTrailingSlash extends TrailingSlashMiddleware
{
    public function handle($request, Closure $next)
    {
        if (! $this->shouldHandle($request, shouldHaveTrailingSlash: true)) {
            return $next($request);
        }

        return $this->redirect($this->getParsedUrl($request)['path'].'/');
    }

    protected function redirect(string $url)
    {
        /* @var $redirector \Illuminate\Routing\Redirector */
        $redirector = app('redirect');

        return $redirector->to($url, 301);
    }
}
