<?php

declare(strict_types=1);

namespace Ship\Middlewares;

use Illuminate\Http\Request;
use Nucleus\Middlewares\Http\Authenticate as CoreMiddleware;
use Ship\Providers\RouteServiceProvider;

class Authenticate extends CoreMiddleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     * @return string|null
     */
    protected function redirectTo($request): ?string
    {
        if (!$request->expectsJson()) {
            return route(RouteServiceProvider::LOGIN);
        }
    }
}
