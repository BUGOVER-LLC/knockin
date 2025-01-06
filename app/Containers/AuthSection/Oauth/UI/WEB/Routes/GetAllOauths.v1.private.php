<?php

declare(strict_types=1);

use Containers\AuthSection\Oauth\UI\WEB\Controllers\GetAllOauthsController;
use Illuminate\Support\Facades\Route;

Route::get('oauths', [GetAllOauthsController::class, 'index'])
    ->middleware(['auth:web']);
