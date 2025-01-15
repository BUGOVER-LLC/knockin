<?php

declare(strict_types=1);

use Containers\AuthSection\Plan\UI\WEB\Controllers\CreatePlanController;
use Illuminate\Support\Facades\Route;

Route::post('plans/store', [CreatePlanController::class, 'store'])
    ->middleware(['auth:web']);
