<?php

use Containers\DashboardSection\User\UI\WEB\Controllers\GetAllUsersController;
use Illuminate\Support\Facades\Route;

Route::get('users', [GetAllUsersController::class, 'index'])
    ->middleware(['auth:web']);

