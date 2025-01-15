<?php

declare(strict_types=1);

use Containers\AuthSection\Plan\UI\WEB\Controller\CreatePlanController;
use Illuminate\Support\Facades\Route;

Route::get('plans/create', [CreatePlanController::class, 'create'])
    ->middleware(['auth:web']);
