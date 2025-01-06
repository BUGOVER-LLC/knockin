<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Claim;

use Laravel\Passport\Bridge\AccessToken;

class CustomAccessToken extends AccessToken
{
    use CustomClaim;
}
