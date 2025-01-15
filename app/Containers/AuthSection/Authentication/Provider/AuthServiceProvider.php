<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Provider;

use Containers\AuthSection\Authentication\Claim\CustomAccessToken;
use Laravel\Passport\Passport;

class AuthServiceProvider extends \Ship\Parent\Provider\AuthServiceProvider
{
    public function boot(): void
    {
    }
}
