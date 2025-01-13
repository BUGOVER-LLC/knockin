<?php

declare(strict_types=1);

use Containers\AuthSection\Authentication\UI\WEB\Controller\UpdateAuthenticationController;
use Illuminate\Support\Facades\Route;

Route::get('authentications/{id}/edit', [UpdateAuthenticationController::class, 'edit'])
    ->middleware(['auth:web']);
