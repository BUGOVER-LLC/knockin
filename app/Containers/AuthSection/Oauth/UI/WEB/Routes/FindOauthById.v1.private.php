<?php

declare(strict_types=1);

use Containers\AuthSection\Oauth\UI\WEB\Controllers\FindOauthByIdController;
use Illuminate\Support\Facades\Route;

Route::get('oauths/{id}', [FindOauthByIdController::class, 'show'])
    ->middleware(['auth:web']);
