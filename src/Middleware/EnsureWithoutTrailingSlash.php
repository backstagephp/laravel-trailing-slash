<?php

namespace Vormkracht10\TrailingSlash\Middleware;

use Closure;

class EnsureWithoutTrailingSlash
{
    public function handle($request, Closure $next)
    {
        if (! in_array($request->getMethod(), ['GET', 'HEAD', 'OPTIONS'])) {
            return $next($request);
        }

        // parse our own constructed url, Laravel is known for letting the trailing slash out in some cases
        $url = parse_url($request->getScheme().'://'.$request->getHost().$request->server('REQUEST_URI'));

        $url['path'] ??= '/';

        // don't mess with urls already ending on trailing slash
        if (str_ends_with($url['path'], '/')) {
            return $next($request);
        }

        // when a file is requested (but probably 404 as it came here), don't mess with trailing slash
        if (str_contains($url['path'], '.')) {
            return $next($request);
        }

        // ajax or pjax shouldn't need redirection
        if ($request->server('HTTP_X_REQUESTED_WITH')) {
            return $next($request);
        }

        $url['path'] = rtrim($url['path'], '/');

        return $this->redirect($request->getScheme().'://'.$request->getHost().$url['path'].$url['query']);
    }

    protected function redirect(string $url)
    {
        /* @var $redirector \Illuminate\Routing\Redirector */
        $redirector = app('redirect');

        return $redirector->to($url, 301);
    }
}
