<?php

declare(strict_types=1);

namespace Containers\Auth\Providers;

class MainServiceProvider extends \Ship\Parents\Providers\MainServiceProvider
{
    /**
     * Container Service Providers.
     */
    public array $serviceProviders = [
        AuthServiceProvider::class
    ];

    /**
     * Container Aliases
     */
    public array $aliases = [

    ];
}
