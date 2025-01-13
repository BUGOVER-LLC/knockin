<?php

declare(strict_types=1);

use Containers\PaymentSection\Subscribe\UI\WEB\Controllers\CreateSubscribeController;
use Illuminate\Support\Facades\Route;

Route::get('subscribes/create', [CreateSubscribeController::class, 'create'])
    ->middleware(['auth:web']);
