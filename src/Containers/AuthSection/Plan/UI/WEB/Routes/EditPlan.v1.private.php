<?php

declare(strict_types=1);

use Containers\AuthSection\Plan\UI\WEB\Controllers\UpdatePlanController;
use Illuminate\Support\Facades\Route;

Route::get('plans/{id}/edit', [UpdatePlanController::class, 'edit'])
    ->middleware(['auth:web']);
