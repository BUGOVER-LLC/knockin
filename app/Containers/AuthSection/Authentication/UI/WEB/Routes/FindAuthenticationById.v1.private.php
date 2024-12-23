<?php

declare(strict_types=1);

use Containers\AuthSection\Authentication\UI\WEB\Controllers\FindAuthenticationByIdController;
use Illuminate\Support\Facades\Route;

Route::get('authentications/{id}', [FindAuthenticationByIdController::class, 'show'])
    ->middleware(['auth:web']);
