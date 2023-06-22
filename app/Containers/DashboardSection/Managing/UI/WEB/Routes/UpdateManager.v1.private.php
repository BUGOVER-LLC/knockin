<?php

use Containers\DashboardSection\Managing\UI\WEB\Controllers\UpdateManagerController;
use Illuminate\Support\Facades\Route;

Route::patch('managers/{id}', [UpdateManagerController::class, 'update'])
    ->middleware(['auth:web']);
