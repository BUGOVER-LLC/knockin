<?php

declare(strict_types=1);

use Containers\AuthSection\Authentication\UI\API\Controllers\UpdateAuthenticationController;
use Illuminate\Support\Facades\Route;

Route::patch('authentications/{id}', [UpdateAuthenticationController::class, 'updateAuthentication'])
    ->middleware(['auth:api']);
