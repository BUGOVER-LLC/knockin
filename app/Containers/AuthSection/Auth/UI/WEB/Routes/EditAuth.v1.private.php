<?php

declare(strict_types=1);

use Containers\AuthSection\Auth\UI\WEB\Controllers\UpdateAuthController;
use Illuminate\Support\Facades\Route;

Route::get('auths/{id}/edit', [UpdateAuthController::class, 'edit'])
    ->middleware(['auth:web']);

