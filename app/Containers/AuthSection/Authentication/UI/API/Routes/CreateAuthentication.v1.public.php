<?php

declare(strict_types=1);

use Containers\AuthSection\Authentication\UI\API\Controller\CreateAuthenticationController;
use Illuminate\Support\Facades\Route;

Route::post('authentications', CreateAuthenticationController::class)
    ->middleware(['auth:api']);
