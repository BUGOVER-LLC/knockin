<?php

declare(strict_types=1);

use Containers\AuthSection\Oauth\UI\API\Controllers\CreateOauthController;
use Illuminate\Support\Facades\Route;

Route::post('oauths', [CreateOauthController::class, 'createOauth'])
    ->middleware(['auth:api']);
