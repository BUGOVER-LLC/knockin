<?php

declare(strict_types=1);

use Containers\AuthSection\Plan\UI\API\Controller\CreatePlanController;
use Illuminate\Support\Facades\Route;

Route::post('plans', [CreatePlanController::class, 'createPlan'])
    ->middleware(['auth:api']);
