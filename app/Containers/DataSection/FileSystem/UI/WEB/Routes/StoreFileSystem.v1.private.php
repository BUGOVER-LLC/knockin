<?php

declare(strict_types=1);

use Containers\DataSection\FileSystem\UI\WEB\Controllers\CreateFileSystemController;
use Illuminate\Support\Facades\Route;

Route::post('file-systems/store', [CreateFileSystemController::class, 'store'])
    ->middleware(['auth:web']);
