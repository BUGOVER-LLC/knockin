<?php

declare(strict_types=1);

use Containers\PaymentSection\Subscribe\UI\API\Controllers\UpdateSubscribeController;
use Illuminate\Support\Facades\Route;

Route::patch('subscribes/{id}', [UpdateSubscribeController::class, 'updateSubscribe'])
    ->middleware(['auth:api']);
