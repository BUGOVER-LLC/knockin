<?php

declare(strict_types=1);

use Containers\AuthSection\Auth\UI\WEB\Controllers\DeleteAuthController;
use Illuminate\Support\Facades\Route;

Route::delete('auths/{id}', [DeleteAuthController::class, 'destroy'])
    ->middleware(['auth:web']);

