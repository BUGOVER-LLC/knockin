<?php

declare(strict_types=1);

use Containers\DataSection\FileSystem\UI\API\Controllers\CreateFileSystemController;
use Illuminate\Support\Facades\Route;

Route::post('file-systems', [CreateFileSystemController::class, 'createFileSystem'])
    ->middleware(['auth:api']);
