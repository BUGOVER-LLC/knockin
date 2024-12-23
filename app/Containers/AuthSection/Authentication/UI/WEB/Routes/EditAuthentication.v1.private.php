<?php

declare(strict_types=1);

use Containers\AuthSection\Authentication\UI\WEB\Controllers\UpdateAuthenticationController;
use Illuminate\Support\Facades\Route;

Route::get('authentications/{id}/edit', [UpdateAuthenticationController::class, 'edit'])
    ->middleware(['auth:web']);
