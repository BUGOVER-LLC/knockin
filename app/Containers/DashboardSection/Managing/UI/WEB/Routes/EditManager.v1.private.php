<?php

use Containers\DashboardSection\Managing\UI\WEB\Controllers\UpdateManagerController;
use Illuminate\Support\Facades\Route;

Route::get('managers/{id}/edit', [UpdateManagerController::class, 'edit'])
    ->middleware(['auth:web']);
