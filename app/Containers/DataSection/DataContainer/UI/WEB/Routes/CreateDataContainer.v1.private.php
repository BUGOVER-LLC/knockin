<?php

declare(strict_types=1);

use Containers\DataSection\DataContainer\UI\WEB\Controllers\CreateDataContainerController;
use Illuminate\Support\Facades\Route;

Route::get('data-containers/create', [CreateDataContainerController::class, 'create'])
    ->middleware(['auth:web']);

