<?php

declare(strict_types=1);

use Containers\PaymentSection\Subscribe\UI\WEB\Controllers\DeleteSubscribeController;
use Illuminate\Support\Facades\Route;

Route::delete('subscribes/{id}', [DeleteSubscribeController::class, 'destroy'])
    ->middleware(['auth:web']);
