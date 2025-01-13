<?php

declare(strict_types=1);

use Containers\PaymentSection\Subscribe\UI\WEB\Controllers\UpdateSubscribeController;
use Illuminate\Support\Facades\Route;

Route::patch('subscribes/{id}', [UpdateSubscribeController::class, 'update'])
    ->middleware(['auth:web']);
