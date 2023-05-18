<?php

declare(strict_types=1);

use Containers\Auth\UI\WEB\Controllers\CheckEmailController;
use Illuminate\Support\Facades\Route;


Route::post('auth/check-email', CheckEmailController::class)
    ->name('auth.check-email')
    ->middleware(['guest']);
