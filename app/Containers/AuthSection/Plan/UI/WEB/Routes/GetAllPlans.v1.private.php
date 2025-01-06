<?php

declare(strict_types=1);

use Containers\AuthSection\Plan\UI\WEB\Controllers\GetAllPlansController;
use Illuminate\Support\Facades\Route;

Route::get('plans', [GetAllPlansController::class, 'index'])
    ->middleware(['auth:web']);
