<?php

declare(strict_types=1);

namespace App\Containers\AuthSection\Authentication\Providers;

use App\Containers\AuthSection\Authentication\Claim\CustomAccessToken;
use App\Containers\AuthSection\Authentication\Models\AuthCode;
use App\Containers\AuthSection\Authentication\Models\Client;
use App\Containers\AuthSection\Authentication\Models\PersonalClient;
use App\Containers\AuthSection\Authentication\Models\RefreshToken;
use App\Containers\AuthSection\Authentication\Models\Token;
use Laravel\Passport\Passport;

class AuthServiceProvider extends \Ship\Parents\Providers\AuthServiceProvider
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
