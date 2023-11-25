<?php

declare(strict_types=1);

use Containers\GreetingSection\Auth\UI\WEB\Controllers\CheckCodeController;
use Containers\GreetingSection\Auth\UI\WEB\Controllers\CheckEmailController;
use Containers\GreetingSection\Auth\UI\WEB\Controllers\SignInController;
use Illuminate\Support\Facades\Route;

$_attributes = [
    'prefix' => 'auth',
    'name' => 'auth',
    'as' => 'auth.',
    'middleware' => ['guest'],
    'namespace' => '\Containers\GreetingSection\Auth\UI\WEB\Controllers'
];

Route::group($_attributes, static fn() => [
    Route::get('/', SignInController::class)
        ->name('auth.get_sign'),

    Route::post('check-email', CheckEmailController::class)
        ->name('auth.check-email'),

    Route::post('check-code', CheckCodeController::class)
        ->name('auth.check-code'),

    Route::get('{any}', SignInController::class)->where('any', '.*'),
]);
