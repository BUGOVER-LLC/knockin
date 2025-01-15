<?php

declare(strict_types=1);

use Containers\PaymentSection\Subscribe\UI\API\Controllers\CreateSubscribeController;
use Illuminate\Support\Facades\Route;

Route::post('subscribes', [CreateSubscribeController::class, 'createSubscribe'])
    ->middleware(['auth:api']);
