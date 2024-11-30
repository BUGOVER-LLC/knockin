<?php

declare(strict_types=1);

use Containers\DataSection\FileContainer\UI\WEB\Controllers\CreateFileContainerController;
use Illuminate\Support\Facades\Route;

Route::get('file-containers/create', [CreateFileContainerController::class, 'create'])
    ->middleware(['auth:web']);

