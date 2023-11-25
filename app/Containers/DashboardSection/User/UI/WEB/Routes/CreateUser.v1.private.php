<?php

declare(strict_types=1);

use Containers\DashboardSection\User\UI\WEB\Controllers\CreateUserController;
use Illuminate\Support\Facades\Route;

Route::get('users/create', [CreateUserController::class, 'create'])
    ->middleware(['auth:web']);

