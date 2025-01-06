<?php

declare(strict_types=1);

use Containers\AuthSection\Plan\UI\WEB\Controllers\UpdatePlanController;
use Illuminate\Support\Facades\Route;

Route::patch('plans/{id}', [UpdatePlanController::class, 'update'])
    ->middleware(['auth:web']);
