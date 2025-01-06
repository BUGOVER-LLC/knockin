<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Provider;

use Containers\AuthSection\Authentication\Claim\CustomAccessToken;
use Containers\AuthSection\Authentication\Model\AuthCode;
use Containers\AuthSection\Authentication\Model\Client;
use Containers\AuthSection\Authentication\Model\PersonalClient;
use Containers\AuthSection\Authentication\Model\RefreshToken;
use Containers\AuthSection\Authentication\Model\Token;
use Laravel\Passport\Passport;

class AuthServiceProvider extends \Ship\Parent\Provider\AuthServiceProvider
{
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
        Passport::tokensExpireIn(now()->addDays(30));
        Passport::refreshTokensExpireIn(now()->addDays(90));
        Passport::personalAccessTokensExpireIn(now()->addDays(30));
    }
}
