<?php

declare(strict_types=1);

namespace Infrastructure\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SetAuthData
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if ($request->hasCookie('authenticator')) {
            return $next($request);
        }

        return $next($request)->withCookie(cookie('authenticator', Str::random(128), 60));
    }
}
