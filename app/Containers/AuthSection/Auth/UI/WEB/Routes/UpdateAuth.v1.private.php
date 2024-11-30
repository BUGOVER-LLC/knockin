<?php

declare(strict_types=1);

use Containers\AuthSection\Auth\UI\WEB\Controllers\UpdateAuthController;
use Illuminate\Support\Facades\Route;

Route::patch('auths/{id}', [UpdateAuthController::class, 'update'])
    ->middleware(['auth:web']);

