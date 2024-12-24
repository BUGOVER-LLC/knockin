<?php

declare(strict_types=1);

use Containers\DataSection\FileSystem\UI\WEB\Controllers\CreateFileSystemController;
use Illuminate\Support\Facades\Route;

Route::get('file-systems/create', [CreateFileSystemController::class, 'create'])
    ->middleware(['auth:web']);