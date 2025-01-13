<?php

declare(strict_types=1);

use Containers\AuthSection\Oauth\UI\WEB\Controllers\DeleteOauthController;
use Illuminate\Support\Facades\Route;

Route::delete('oauths/{id}', [DeleteOauthController::class, 'destroy'])
    ->middleware(['auth:web']);
