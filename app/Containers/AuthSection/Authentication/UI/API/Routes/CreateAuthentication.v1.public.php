<?php

declare(strict_types=1);

use Containers\AuthSection\Authentication\UI\API\Controllers\CreateAuthenticationController;
use Illuminate\Support\Facades\Route;

Route::post('authentications', [CreateAuthenticationController::class, 'createAuthentication'])
    ->middleware(['auth:api']);
