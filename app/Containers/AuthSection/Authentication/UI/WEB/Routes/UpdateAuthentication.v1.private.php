<?php

declare(strict_types=1);

use Containers\AuthSection\Authentication\UI\WEB\Controller\UpdateAuthenticationController;
use Illuminate\Support\Facades\Route;

Route::patch('authentications/{id}', [UpdateAuthenticationController::class, 'update'])
    ->middleware(['auth:web']);
