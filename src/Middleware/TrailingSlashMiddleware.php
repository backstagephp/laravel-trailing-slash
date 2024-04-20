<?php

namespace Vormkracht10\TrailingSlash\Middleware;

use Illuminate\Http\Request;

class TrailingSlashMiddleware
{
    protected $parsedUrl;

    public function shouldHandle(Request $request, $shouldHaveTrailingSlash = true)
    {
        if (! in_array($request->getMethod(), config('trailing-slash.methods'))) {
            return false;
        }

        if ($this->getParsedUrl($request)['path'] === '/') {
            return false;
        }

        // don't mess with urls already ending on trailing slash
        if (
            $shouldHaveTrailingSlash &&
            str_ends_with($this->getParsedUrl($request)['path'], '/')
        ) {
            return false;
        }

        // don't mess with urls already without trailing slash
        if (
            ! $shouldHaveTrailingSlash &&
            ! str_ends_with($this->getParsedUrl($request)['path'], '/')
        ) {
            return false;
        }

        // when a file is requested (but probably 404 as it came here), don't mess with trailing slash
        if (str_contains($this->getParsedUrl($request)['path'], '.')) {
            return false;
        }

        // ajax or pjax shouldn't need redirection
        if ($request->server('HTTP_X_REQUESTED_WITH')) {
            return false;
        }

        return true;
    }

    public function getParsedUrl(Request $request)
    {
        if ($this->parsedUrl) {
            return $this->parsedUrl;
        }

        $this->parsedUrl = parse_url($request->getScheme().'://'.$request->getHost().$request->server('REQUEST_URI'));

        $this->parsedUrl['path'] ??= '/';

        return $this->parsedUrl;
    }

    protected function redirect(string $url)
    {
        /* @var $redirector \Illuminate\Routing\Redirector */
        $redirector = app('redirect');

        return $redirector->to($url, 301);
    }
}
