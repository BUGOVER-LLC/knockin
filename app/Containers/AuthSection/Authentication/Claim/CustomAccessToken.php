<?php

declare(strict_types=1);

namespace App\Containers\AuthSection\Authentication\Claim;

use Laravel\Passport\Bridge\AccessToken;

class CustomAccessToken extends AccessToken
{
    use CustomClaim;
}
