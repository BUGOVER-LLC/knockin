<?php

declare(strict_types=1);

use Containers\AuthSection\Authentication\UI\WEB\Controller\DeleteAuthenticationController;
use Illuminate\Support\Facades\Route;

Route::delete('authentications/{id}', [DeleteAuthenticationController::class, 'destroy'])
    ->middleware(['auth:web']);
