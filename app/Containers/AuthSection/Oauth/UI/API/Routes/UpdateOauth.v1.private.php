<?php

declare(strict_types=1);

use Containers\AuthSection\Oauth\UI\API\Controllers\UpdateOauthController;
use Illuminate\Support\Facades\Route;

Route::patch('oauths/{id}', [UpdateOauthController::class, 'updateOauth'])
    ->middleware(['auth:api']);
