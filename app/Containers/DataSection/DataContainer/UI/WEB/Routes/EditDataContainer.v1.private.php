<?php

declare(strict_types=1);

use Containers\DataSection\DataContainer\UI\WEB\Controllers\UpdateDataContainerController;
use Illuminate\Support\Facades\Route;

Route::get('data-containers/{id}/edit', [UpdateDataContainerController::class, 'edit'])
    ->middleware(['auth:web']);

