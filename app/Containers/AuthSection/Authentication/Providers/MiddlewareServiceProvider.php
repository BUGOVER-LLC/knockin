<?php

declare(strict_types=1);

namespace App\Containers\AuthSection\Authentication\Providers;

use Ship\Parents\Providers\MiddlewareServiceProvider as ParentMiddlewareServiceProviderAlias;

class MiddlewareServiceProvider extends ParentMiddlewareServiceProviderAlias
{
    protected array $middlewares = [];

    protected array $middlewareGroups = [];

    protected array $routeMiddleware = [
        'guest' => \Illuminate\Auth\Middleware\RedirectIfAuthenticated::class,
    ];

    protected array $middlewarePriority = [];
}
