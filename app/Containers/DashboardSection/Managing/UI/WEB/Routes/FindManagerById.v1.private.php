<?php

use Containers\DashboardSection\Managing\UI\WEB\Controllers\FindManagerByIdController;
use Illuminate\Support\Facades\Route;

Route::get('managers/{id}', [FindManagerByIdController::class, 'show'])
    ->middleware(['auth:web']);

