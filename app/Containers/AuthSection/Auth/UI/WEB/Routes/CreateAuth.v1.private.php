<?php

declare(strict_types=1);

use Containers\AuthSection\Auth\UI\WEB\Controllers\CreateAuthController;
use Illuminate\Support\Facades\Route;

Route::get('auths/create', [CreateAuthController::class, 'create'])
    ->middleware(['auth:web']);

