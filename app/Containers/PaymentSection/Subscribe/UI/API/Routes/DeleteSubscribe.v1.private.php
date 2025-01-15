<?php

declare(strict_types=1);

use Containers\PaymentSection\Subscribe\UI\API\Controllers\DeleteSubscribeController;
use Illuminate\Support\Facades\Route;

Route::delete('subscribes/{id}', [DeleteSubscribeController::class, 'deleteSubscribe'])
    ->middleware(['auth:api']);
