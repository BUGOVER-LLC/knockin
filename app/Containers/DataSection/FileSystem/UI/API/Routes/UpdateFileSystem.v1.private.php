<?php

declare(strict_types=1);

use Containers\DataSection\FileSystem\UI\API\Controllers\UpdateFileSystemController;
use Illuminate\Support\Facades\Route;

Route::patch('file-systems/{id}', [UpdateFileSystemController::class, 'updateFileSystem'])
    ->middleware(['auth:api']);
