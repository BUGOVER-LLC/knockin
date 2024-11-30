<?php

declare(strict_types=1);

use Containers\DataSection\FileContainer\UI\WEB\Controllers\GetAllFileContainersController;
use Illuminate\Support\Facades\Route;

Route::get('file-containers', [GetAllFileContainersController::class, 'index'])
    ->middleware(['auth:web']);

