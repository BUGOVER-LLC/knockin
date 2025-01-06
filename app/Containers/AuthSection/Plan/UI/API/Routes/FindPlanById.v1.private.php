<?php

declare(strict_types=1);

use Containers\AuthSection\Plan\UI\API\Controllers\FindPlanByIdController;
use Illuminate\Support\Facades\Route;

Route::get('plans/{id}', [FindPlanByIdController::class, 'findPlanById'])
    ->middleware(['auth:api']);
