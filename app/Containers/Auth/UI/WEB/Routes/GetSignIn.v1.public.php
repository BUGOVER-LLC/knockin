<?php

declare(strict_types=1);

use Containers\Auth\UI\WEB\Controllers\SignInController;
use Illuminate\Support\Facades\Route;


Route::get('auth', SignInController::class)
    ->name('auth.get_sign')
    ->middleware(['guest']);
