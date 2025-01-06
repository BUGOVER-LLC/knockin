<?php

declare(strict_types=1);

use Containers\AuthSection\Authentication\UI\WEB\Controller\CreateAuthenticationController;
use Illuminate\Support\Facades\Route;

Route::post('authentications/store', [CreateAuthenticationController::class, 'store'])
    ->middleware(['auth:web']);
