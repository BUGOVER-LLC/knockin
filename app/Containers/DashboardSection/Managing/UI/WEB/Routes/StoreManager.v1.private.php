<?php

use Containers\DashboardSection\Managing\UI\WEB\Controllers\CreateManagerController;
use Illuminate\Support\Facades\Route;

Route::post('managers/store', [CreateManagerController::class, 'store'])
    ->middleware(['auth:web']);
