<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Auth\Providers;

use Containers\GreetingSection\Auth\Middlewares\RedirectIfAuthenticated;

class MiddlewareServiceProvider extends \Ship\Parents\Providers\MiddlewareServiceProvider
{
    protected array $middlewares = [];

    protected array $middlewareGroups = [];

    protected array $middlewarePriority = [];

    protected array $routeMiddleware = [
        'guest' => RedirectIfAuthenticated::class,
    ];
}
