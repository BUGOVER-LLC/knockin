<?php

declare(strict_types=1);

use Containers\AuthSection\Plan\UI\API\Controllers\DeletePlanController;
use Illuminate\Support\Facades\Route;

Route::delete('plans/{id}', [DeletePlanController::class, 'deletePlan'])
    ->middleware(['auth:api']);
