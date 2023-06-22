<?php

use Containers\DashboardSection\Managing\UI\WEB\Controllers\GetAllManagersController;
use Illuminate\Support\Facades\Route;

Route::get('managers', [GetAllManagersController::class, 'index'])
    ->middleware(['auth:web']);

