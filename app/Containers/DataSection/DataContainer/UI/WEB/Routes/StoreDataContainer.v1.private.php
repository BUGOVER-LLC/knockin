<?php

declare(strict_types=1);

use Containers\DataSection\DataContainer\UI\WEB\Controllers\CreateDataContainerController;
use Illuminate\Support\Facades\Route;

Route::post('data-containers/store', [CreateDataContainerController::class, 'store'])
    ->middleware(['auth:web']);

