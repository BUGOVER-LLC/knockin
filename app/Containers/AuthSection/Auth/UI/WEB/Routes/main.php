<?php

declare(strict_types=1);

use App\Containers\AuthSection\Auth\UI\WEB\Controllers\AuthPageController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'auth',
        'namespace' => '\App\Containers\AuthSection\Auth\UI\WEB\Controllers',
        'middleware' => ['guest', 'web'],
    ],
    fn() => [
        Route::get('/', AuthPageController::class),
    ]
);
