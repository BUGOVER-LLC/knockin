<?php

declare(strict_types=1);

use Containers\PaymentSection\Subscribe\UI\WEB\Controllers\UpdateSubscribeController;
use Illuminate\Support\Facades\Route;

Route::get('subscribes/{id}/edit', [UpdateSubscribeController::class, 'edit'])
    ->middleware(['auth:web']);
