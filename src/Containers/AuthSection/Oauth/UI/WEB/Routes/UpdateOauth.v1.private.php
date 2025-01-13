<?php

declare(strict_types=1);

use Containers\AuthSection\Oauth\UI\WEB\Controllers\UpdateOauthController;
use Illuminate\Support\Facades\Route;

Route::patch('oauths/{id}', [UpdateOauthController::class, 'update'])
    ->middleware(['auth:web']);
