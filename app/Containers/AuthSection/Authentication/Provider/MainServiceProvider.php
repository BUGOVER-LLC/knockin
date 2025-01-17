<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Provider;

use Containers\AuthSection\Authentication\Provider\AuthServiceProvider;
use Containers\AuthSection\Authentication\Provider\MiddlewareServiceProvider;
use Ship\Parent\Provider\MainServiceProvider as ParentMainServiceProvider;

/**
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends ParentMainServiceProvider
{
    /**
     * Container Service Providers.
     */
    public array $serviceProviders = [
        MiddlewareServiceProvider::class,
        AuthServiceProvider::class,
    ];

    /**
     * Container Aliases
     */
    public array $aliases = [
        // 'Foo' => Bar::class,
    ];

    /**
     * Register anything in the container.
     */
    public function register(): void
    {
        parent::register();

        // $this->src->bind(UserRepositoryInterface::class, UserRepository::class);
        // ...
    }
}
