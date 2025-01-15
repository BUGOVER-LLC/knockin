<?php

declare(strict_types=1);

use Containers\AuthSection\Oauth\UI\API\Controllers\GetAllOauthsController;
use Illuminate\Support\Facades\Route;

Route::get('oauths', [GetAllOauthsController::class, 'getAllOauths'])
    ->middleware(['auth:api']);
