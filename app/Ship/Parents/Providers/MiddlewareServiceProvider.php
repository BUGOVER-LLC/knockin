<?php

namespace App\Ship\Parents\Providers;

use Nucleus\src\Abstracts\Providers\MiddlewareServiceProvider as AbstractMiddlewareServiceProvider;

abstract class MiddlewareServiceProvider extends AbstractMiddlewareServiceProvider
{
    protected array $middlewares = [];

    protected array $middlewareGroups = [];

    protected array $middlewarePriority = [];

    protected array $routeMiddleware = [];
}
