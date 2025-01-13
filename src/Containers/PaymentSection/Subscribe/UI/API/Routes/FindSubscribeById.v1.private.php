<?php

declare(strict_types=1);

use Containers\PaymentSection\Subscribe\UI\API\Controllers\FindSubscribeByIdController;
use Illuminate\Support\Facades\Route;

Route::get('subscribes/{id}', [FindSubscribeByIdController::class, 'findSubscribeById'])
    ->middleware(['auth:api']);
