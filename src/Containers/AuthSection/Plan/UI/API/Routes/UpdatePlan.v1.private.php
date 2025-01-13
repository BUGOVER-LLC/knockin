<?php

declare(strict_types=1);

use Containers\AuthSection\Plan\UI\API\Controllers\UpdatePlanController;
use Illuminate\Support\Facades\Route;

Route::patch('plans/{id}', [UpdatePlanController::class, 'updatePlan'])
    ->middleware(['auth:api']);
