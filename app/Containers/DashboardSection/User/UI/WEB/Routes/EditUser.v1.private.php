<?php

use Containers\DashboardSection\User\UI\WEB\Controllers\UpdateUserController;
use Illuminate\Support\Facades\Route;

Route::get('users/{id}/edit', [UpdateUserController::class, 'edit'])
    ->middleware(['auth:web']);

