<?php

declare(strict_types=1);

use Containers\AuthSection\Plan\UI\WEB\Controllers\FindPlanByIdController;
use Illuminate\Support\Facades\Route;

Route::get('plans/{id}', [FindPlanByIdController::class, 'show'])
    ->middleware(['auth:web']);
