<?php

declare(strict_types=1);

use Containers\AuthSection\Auth\UI\WEB\Controllers\CreateAuthController;
use Illuminate\Support\Facades\Route;

Route::post('auths/store', [CreateAuthController::class, 'store'])
    ->middleware(['auth:web']);

