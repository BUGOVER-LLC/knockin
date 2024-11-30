<?php

declare(strict_types=1);

use Containers\DataSection\DataContainer\UI\WEB\Controllers\UpdateDataContainerController;
use Illuminate\Support\Facades\Route;

Route::patch('data-containers/{id}', [UpdateDataContainerController::class, 'update'])
    ->middleware(['auth:web']);

