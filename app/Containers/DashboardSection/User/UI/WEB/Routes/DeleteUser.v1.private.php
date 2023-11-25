<?php

use Containers\DashboardSection\User\UI\WEB\Controllers\DeleteUserController;
use Illuminate\Support\Facades\Route;

Route::delete('users/{id}', [DeleteUserController::class, 'destroy'])
    ->middleware(['auth:web']);

