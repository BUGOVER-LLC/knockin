<?php

declare(strict_types=1);

use Containers\AuthSection\Oauth\UI\API\Controllers\DeleteOauthController;
use Illuminate\Support\Facades\Route;

Route::delete('oauths/{id}', [DeleteOauthController::class, 'deleteOauth'])
    ->middleware(['auth:api']);
