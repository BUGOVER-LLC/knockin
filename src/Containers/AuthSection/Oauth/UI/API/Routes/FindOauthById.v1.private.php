<?php

declare(strict_types=1);

use Containers\AuthSection\Oauth\UI\API\Controllers\FindOauthByIdController;
use Illuminate\Support\Facades\Route;

Route::get('oauths/{id}', [FindOauthByIdController::class, 'findOauthById'])
    ->middleware(['auth:api']);
