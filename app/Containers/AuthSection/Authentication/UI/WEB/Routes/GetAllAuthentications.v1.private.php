<?php

declare(strict_types=1);

use Containers\AuthSection\Authentication\UI\WEB\Controllers\GetAllAuthenticationsController;
use Illuminate\Support\Facades\Route;

Route::get('authentications', [GetAllAuthenticationsController::class, 'index'])
    ->middleware(['auth:web']);