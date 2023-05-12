<?php

namespace App\Ship\Middlewares;

use Nucleus\Middlewares\Http\Authenticate as CoreMiddleware;
use App\Ship\Providers\RouteServiceProvider;

class Authenticate extends CoreMiddleware
{
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route(RouteServiceProvider::LOGIN);
        }
    }
}
