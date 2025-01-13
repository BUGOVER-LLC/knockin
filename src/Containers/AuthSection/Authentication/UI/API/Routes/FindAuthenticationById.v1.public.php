<?php

declare(strict_types=1);

use Containers\AuthSection\Authentication\UI\API\Controller\FindAuthenticationByIdController;
use Illuminate\Support\Facades\Route;

Route::get('authentications/{id}', [FindAuthenticationByIdController::class, 'findAuthenticationById'])
    ->middleware(['auth:api']);
