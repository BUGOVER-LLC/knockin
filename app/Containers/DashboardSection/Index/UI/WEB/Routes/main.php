<?php

declare(strict_types=1);

use Containers\DashboardSection\Index\UI\WEB\Controllers\MainBoardController;

$route_attributes = [
    'middleware' => ['auth:web'],
    'namespace' => '\Containers\DashboardSection\Index\UI\WEB\Controllers'
];

Route::group($route_attributes, static fn() => [
    Route::get('/', MainBoardController::class)
]);
