<?php

declare(strict_types=1);

use Containers\Auth\UI\WEB\Controllers\CheckCodeController;
use Illuminate\Support\Facades\Route;


Route::post('auth/check-email', CheckCodeController::class)
    ->name('auth.check-email')
    ->middleware(['guest']);
