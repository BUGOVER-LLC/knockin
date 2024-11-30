<?php

declare(strict_types=1);

use Containers\AuthSection\Auth\UI\WEB\Controllers\GetAllAuthsController;
use Illuminate\Support\Facades\Route;

Route::get('auths', [GetAllAuthsController::class, 'index'])
    ->middleware(['auth:web']);

