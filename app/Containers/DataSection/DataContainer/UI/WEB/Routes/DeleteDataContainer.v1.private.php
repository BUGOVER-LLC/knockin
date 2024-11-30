<?php

declare(strict_types=1);

use Containers\DataSection\DataContainer\UI\WEB\Controllers\DeleteDataContainerController;
use Illuminate\Support\Facades\Route;

Route::delete('data-containers/{id}', [DeleteDataContainerController::class, 'destroy'])
    ->middleware(['auth:web']);

