<?php

declare(strict_types=1);

use Containers\DataSection\DataContainer\UI\WEB\Controllers\GetAllDataContainersController;
use Illuminate\Support\Facades\Route;

Route::get('data-containers', [GetAllDataContainersController::class, 'index'])
    ->middleware(['auth:web']);

