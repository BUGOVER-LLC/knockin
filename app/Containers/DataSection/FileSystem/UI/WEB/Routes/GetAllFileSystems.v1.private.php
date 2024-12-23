<?php

declare(strict_types=1);

use Containers\DataSection\FileSystem\UI\WEB\Controllers\GetAllFileSystemsController;
use Illuminate\Support\Facades\Route;

Route::get('file-systems', [GetAllFileSystemsController::class, 'index'])
    ->middleware(['auth:web']);
