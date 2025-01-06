<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\Claim;

use Laravel\Passport\Bridge\AccessToken;

class CustomAccessToken extends AccessToken
{
    use CustomClaim;
}
