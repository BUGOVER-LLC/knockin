<?php

declare(strict_types=1);

use Containers\PaymentSection\Subscribe\UI\WEB\Controllers\FindSubscribeByIdController;
use Illuminate\Support\Facades\Route;

Route::get('subscribes/{id}', [FindSubscribeByIdController::class, 'show'])
    ->middleware(['auth:web']);
