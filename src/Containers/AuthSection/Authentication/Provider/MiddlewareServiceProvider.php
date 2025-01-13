<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Provider;

use Ship\Parent\Provider\MiddlewareServiceProvider as ParentMiddlewareServiceProviderAlias;

class MiddlewareServiceProvider extends ParentMiddlewareServiceProviderAlias
{
    protected array $middlewares = [];

    protected array $middlewareGroups = [];

    protected array $routeMiddleware = [
        'guest' => \Illuminate\Auth\Middleware\RedirectIfAuthenticated::class,
    ];

    protected array $middlewarePriority = [];
}
