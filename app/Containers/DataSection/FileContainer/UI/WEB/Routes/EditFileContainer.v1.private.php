<?php

declare(strict_types=1);

use Containers\DataSection\FileContainer\UI\WEB\Controllers\UpdateFileContainerController;
use Illuminate\Support\Facades\Route;

Route::get('file-containers/{id}/edit', [UpdateFileContainerController::class, 'edit'])
    ->middleware(['auth:web']);

