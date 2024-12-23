<?php

declare(strict_types=1);

use Containers\AuthSection\Authentication\UI\WEB\Controllers\CreateAuthenticationController;
use Illuminate\Support\Facades\Route;

Route::get('authentications/create', [CreateAuthenticationController::class, 'create'])
    ->middleware(['auth:web']);
