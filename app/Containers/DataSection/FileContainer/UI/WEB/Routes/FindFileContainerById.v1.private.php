<?php

declare(strict_types=1);

use Containers\DataSection\FileContainer\UI\WEB\Controllers\FindFileContainerByIdController;
use Illuminate\Support\Facades\Route;

Route::get('file-containers/{id}', [FindFileContainerByIdController::class, 'show'])
    ->middleware(['auth:web']);

