<?php

declare(strict_types=1);

use Containers\DataSection\FileContainer\UI\WEB\Controllers\UpdateFileContainerController;
use Illuminate\Support\Facades\Route;

Route::patch('file-containers/{id}', [UpdateFileContainerController::class, 'update'])
    ->middleware(['auth:web']);

