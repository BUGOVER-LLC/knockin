<?php

namespace App\Ship\Parents\Providers;

use Nucleus\src\Abstracts\Providers\AuthServiceProvider as AbstractAuthServiceProvider;

/**
 * Class ShipAuthServiceProvider
 *
 * A.K.A. App\Providers\AuthServiceProvider.php
 */
abstract class AuthServiceProvider extends AbstractAuthServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [];
}
