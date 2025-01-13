<?php

declare(strict_types=1);

use Containers\AuthSection\Authentication\UI\API\Controller\DeleteAuthenticationController;
use Illuminate\Support\Facades\Route;

Route::delete('authentications/{id}', [DeleteAuthenticationController::class, 'deleteAuthentication'])
    ->middleware(['auth:api']);
