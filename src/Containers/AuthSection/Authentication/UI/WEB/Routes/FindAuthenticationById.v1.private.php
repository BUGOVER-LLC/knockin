<?php

declare(strict_types=1);

use Containers\AuthSection\Authentication\UI\WEB\Controller\FindAuthenticationByIdController;
use Illuminate\Support\Facades\Route;

Route::get('authentications/{id}', [FindAuthenticationByIdController::class, 'show'])
    ->middleware(['auth:web']);
