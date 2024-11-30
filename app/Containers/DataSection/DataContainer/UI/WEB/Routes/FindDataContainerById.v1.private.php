<?php

declare(strict_types=1);

use Containers\DataSection\DataContainer\UI\WEB\Controllers\FindDataContainerByIdController;
use Illuminate\Support\Facades\Route;

Route::get('data-containers/{id}', [FindDataContainerByIdController::class, 'show'])
    ->middleware(['auth:web']);

