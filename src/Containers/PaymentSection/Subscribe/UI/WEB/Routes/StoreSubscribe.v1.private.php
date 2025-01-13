<?php

declare(strict_types=1);

use Containers\PaymentSection\Subscribe\UI\WEB\Controllers\CreateSubscribeController;
use Illuminate\Support\Facades\Route;

Route::post('subscribes/store', [CreateSubscribeController::class, 'store'])
    ->middleware(['auth:web']);
