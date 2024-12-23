<?php

declare(strict_types=1);

use Containers\DataSection\FileSystem\UI\WEB\Controllers\FindFileSystemByIdController;
use Illuminate\Support\Facades\Route;

Route::get('file-systems/{id}', [FindFileSystemByIdController::class, 'show'])
    ->middleware(['auth:web']);
