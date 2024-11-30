<?php

declare(strict_types=1);

use Containers\DataSection\FileContainer\UI\WEB\Controllers\DeleteFileContainerController;
use Illuminate\Support\Facades\Route;

Route::delete('file-containers/{id}', [DeleteFileContainerController::class, 'destroy'])
    ->middleware(['auth:web']);

