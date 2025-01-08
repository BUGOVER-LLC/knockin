<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\Providers;

use Containers\AuthSection\Authentication\Claim\CustomAccessToken;
use Containers\AuthSection\Oauth\Models\AuthCode;
use Containers\AuthSection\Oauth\Models\Client;
use Containers\AuthSection\Oauth\Models\PersonalClient;
use Containers\AuthSection\Oauth\Models\RefreshToken;
use Containers\AuthSection\Oauth\Models\Token;
use Laravel\Passport\Passport;
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
        // InternalServiceProviderExample::class,
    ];

    /**
     * Container Aliases
     */
    public array $aliases = [
        // 'Foo' => Bar::class,
    ];

    public function boot(): void
    {
        // Keys path
        Passport::loadKeysFrom(__DIR__ . '/../var');
        Passport::keyPath(__DIR__ . '/../var');

        // Grants
        Passport::enablePasswordGrant();
        Passport::enableImplicitGrant();

        // Custom JWT Generator
        Passport::useAccessTokenEntity(CustomAccessToken::class);

        // Scopes
        Passport::tokensCan([]);
        Passport::setDefaultScope([]);

        // Models
        Passport::useTokenModel(Token::class);
        Passport::useClientModel(Client::class);
        Passport::useAuthCodeModel(AuthCode::class);
        Passport::useRefreshTokenModel(RefreshToken::class);
        Passport::usePersonalAccessClientModel(PersonalClient::class);

        // Expires
        Passport::tokensExpireIn(now()->addDays(config('nucleus.api.expires-in')));
        Passport::refreshTokensExpireIn(now()->addDays(config('nucleus.api.refresh-expires-in')));
        Passport::personalAccessTokensExpireIn(now()->addDays(config('nucleus.api.expires-in')));
    }

    /**
     * Register anything in the container.
     */
    public function register(): void
    {
        parent::register();

        // $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        // ...
    }
}
