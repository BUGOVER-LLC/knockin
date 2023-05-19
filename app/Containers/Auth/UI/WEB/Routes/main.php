<?php

declare(strict_types=1);

use Containers\Auth\UI\WEB\Controllers\SignInController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['guest'], 'prefix' => 'auth', 'namespace' => '\Containers\Auth\UI\WEB\Controllers'],
    static fn() => [
        Route::get('/', SignInController::class)
            ->name('auth.get_sign'),

        Route::post('check-code', '\Containers\Auth\UI\WEB\Controllers\CheckCodeController')
            ->name('auth.check-code'),

        Route::post('check-email', '\Containers\Auth\UI\WEB\Controllers\CheckEmailController')
            ->name('auth.check-email'),
    ]
);
