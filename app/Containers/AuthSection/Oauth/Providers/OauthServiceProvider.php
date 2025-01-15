<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\Providers;

use Containers\AuthSection\Authentication\Claim\CustomAccessToken;
use Containers\AuthSection\Oauth\Models\AuthCode;
use Containers\AuthSection\Oauth\Models\Client;
use Containers\AuthSection\Oauth\Models\PersonalClient;
use Containers\AuthSection\Oauth\Models\RefreshToken;
use Containers\AuthSection\Oauth\Models\Token;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class OauthServiceProvider extends ServiceProvider
{
    public function boot()
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
}
