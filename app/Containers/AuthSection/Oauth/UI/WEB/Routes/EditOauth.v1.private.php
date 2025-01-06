<?php

declare(strict_types=1);

use Containers\AuthSection\Oauth\UI\WEB\Controllers\UpdateOauthController;
use Illuminate\Support\Facades\Route;

Route::get('oauths/{id}/edit', [UpdateOauthController::class, 'edit'])
    ->middleware(['auth:web']);
