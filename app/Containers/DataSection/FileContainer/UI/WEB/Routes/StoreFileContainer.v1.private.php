<?php

declare(strict_types=1);

use Containers\DataSection\FileContainer\UI\WEB\Controllers\CreateFileContainerController;
use Illuminate\Support\Facades\Route;

Route::post('file-containers/store', [CreateFileContainerController::class, 'store'])
    ->middleware(['auth:web']);

