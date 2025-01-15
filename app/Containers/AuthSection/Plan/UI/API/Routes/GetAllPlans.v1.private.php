<?php

declare(strict_types=1);

use Containers\AuthSection\Plan\UI\API\Controllers\GetAllPlansController;
use Illuminate\Support\Facades\Route;

Route::get('plans', [GetAllPlansController::class, 'getAllPlans'])
    ->middleware(['auth:api']);
