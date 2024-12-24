<?php

declare(strict_types=1);

use Containers\GreetingSection\Home\UI\WEB\Controllers\CreateHomeController;
use Illuminate\Support\Facades\Route;

Route::group(
    ['namespace' => '\Containers\GreetingSection\Home\UI\WEB\Controllers', 'middleware' => ['guest']],
    static fn() => [
        Route::get('/', CreateHomeController::class),
    ]
);
