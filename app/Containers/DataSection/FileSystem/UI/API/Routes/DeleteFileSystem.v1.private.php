<?php

declare(strict_types=1);

use Containers\DataSection\FileSystem\UI\API\Controllers\DeleteFileSystemController;
use Illuminate\Support\Facades\Route;

Route::delete('file-systems/{id}', [DeleteFileSystemController::class, 'deleteFileSystem'])
    ->middleware(['auth:api']);
