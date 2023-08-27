<?php

use Containers\DashboardSection\Managing\UI\WEB\Controllers\CreateManagerController;
use Illuminate\Support\Facades\Route;

Route::get('managers/create', [CreateManagerController::class, 'create'])
    ->middleware(['auth:web']);
