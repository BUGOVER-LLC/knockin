<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Auth\Providers;

use App\Containers\GreetingSection\Auth\Providers\FortifyServiceProvider;

class MainServiceProvider extends \Ship\Parents\Providers\MainServiceProvider
{
    /**
     * Container Service Providers.
     */
    public array $serviceProviders = [
        AuthServiceProvider::class,
        MiddlewareServiceProvider::class,
        FortifyServiceProvider::class
    ];

    /**
     * Container Aliases
     */
    public array $aliases = [

    ];
}
