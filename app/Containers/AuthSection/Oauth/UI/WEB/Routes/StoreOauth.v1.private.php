<?php

declare(strict_types=1);

use Containers\AuthSection\Oauth\UI\WEB\Controllers\CreateOauthController;
use Illuminate\Support\Facades\Route;

Route::post('oauths/store', [CreateOauthController::class, 'store'])
    ->middleware(['auth:web']);
