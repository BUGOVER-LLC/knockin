<?php

declare(strict_types=1);

use Containers\DataSection\FileSystem\UI\WEB\Controllers\UpdateFileSystemController;
use Illuminate\Support\Facades\Route;

Route::get('file-systems/{id}/edit', [UpdateFileSystemController::class, 'edit'])
    ->middleware(['auth:web']);
