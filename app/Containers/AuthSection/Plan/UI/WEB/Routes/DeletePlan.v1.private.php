<?php

declare(strict_types=1);

use Containers\AuthSection\Plan\UI\WEB\Controllers\DeletePlanController;
use Illuminate\Support\Facades\Route;

Route::delete('plans/{id}', [DeletePlanController::class, 'destroy'])
    ->middleware(['auth:web']);
