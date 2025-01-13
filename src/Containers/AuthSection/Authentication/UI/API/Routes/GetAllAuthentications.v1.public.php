<?php

declare(strict_types=1);

use Containers\AuthSection\Authentication\UI\API\Controller\GetAllAuthenticationsController;
use Illuminate\Support\Facades\Route;

Route::get('authentications', [GetAllAuthenticationsController::class, 'getAllAuthentications'])
    ->middleware(['auth:api']);
