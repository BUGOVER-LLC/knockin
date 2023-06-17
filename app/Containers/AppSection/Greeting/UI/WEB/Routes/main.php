<?php

declare(strict_types=1);

use Containers\AppSection\Greeting\UI\WEB\Controllers\GreetingIndexController;
use Illuminate\Support\Facades\Route;

$route_attributes = ['middleware' => ['guest'], 'name' => 'greeting', 'as' => 'greeting.', 'namespace' => '\Containers\AppSection\Greeting\UI\WEB\Controllers'];

Route::group($route_attributes, static fn() => [
    Route::get('', GreetingIndexController::class)->name('greeting-index')
]);
