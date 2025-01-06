<?php

declare(strict_types=1);

use Containers\AuthSection\Oauth\UI\WEB\Controllers\CreateOauthController;
use Illuminate\Support\Facades\Route;

Route::get('oauths/create', [CreateOauthController::class, 'create'])
    ->middleware(['auth:web']);
