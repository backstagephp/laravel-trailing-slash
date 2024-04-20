<?php

namespace Vormkracht10\TrailingSlash\Middleware;

use Closure;

class EnsureUrlsWithoutTrailingSlash extends TrailingSlashMiddleware
{
    public function handle($request, Closure $next)
    {
        if (! $this->shouldHandle($request, shouldHaveTrailingSlash: false)) {
            return $next($request);
        }

        return $this->redirect(
            $request->getScheme().'://'.
            $request->getHost().
            rtrim($this->getParsedUrl($request)['path'], '/').
            ($this->getParsedUrl($request)['query'] ?? '')
        );
    }

    protected function redirect(string $url)
    {
        /* @var $redirector \Illuminate\Routing\Redirector */
        $redirector = app('redirect');

        return $redirector->to($url, 301);
    }
}
