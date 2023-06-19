<?php

declare(strict_types=1);

use Containers\Auth\UI\WEB\Controllers\CheckCodeController;
use Containers\Auth\UI\WEB\Controllers\CheckEmailController;
use Containers\Auth\UI\WEB\Controllers\SignInController;
use Illuminate\Support\Facades\Route;

$route_attributes = [
    'prefix' => 'auth',
    'name' => 'auth',
    'as' => 'auth.',
    'middleware' => ['guest'],
    'namespace' => '\Containers\Auth\UI\WEB\Controllers'
];

Route::group($route_attributes, static fn() => [
    Route::get('/', SignInController::class)
        ->name('auth.get_sign'),

    Route::post('check-code', CheckCodeController::class)
        ->name('auth.check-code'),

    Route::post('check-email', CheckEmailController::class)
        ->name('auth.check-email'),

    Route::get('{any}', SignInController::class)->where('any', '.*'),
]);
