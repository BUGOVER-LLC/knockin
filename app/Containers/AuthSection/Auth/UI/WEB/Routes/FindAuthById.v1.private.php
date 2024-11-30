<?php

declare(strict_types=1);

use Containers\AuthSection\Auth\UI\WEB\Controllers\FindAuthByIdController;
use Illuminate\Support\Facades\Route;

Route::get('auths/{id}', [FindAuthByIdController::class, 'show'])
    ->middleware(['auth:web']);

