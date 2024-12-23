<?php

declare(strict_types=1);

use Containers\DataSection\FileSystem\UI\API\Controllers\GetAllFileSystemsController;
use Illuminate\Support\Facades\Route;

Route::get('file-systems', [GetAllFileSystemsController::class, 'getAllFileSystems'])
    ->middleware(['auth:api']);
