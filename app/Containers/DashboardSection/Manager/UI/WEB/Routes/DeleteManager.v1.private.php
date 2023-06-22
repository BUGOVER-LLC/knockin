<?php

use App\Containers\DashboardSection\Manager\UI\WEB\Controllers\DeleteManagerController;
use Illuminate\Support\Facades\Route;

Route::delete('managers/{id}', [DeleteManagerController::class, 'destroy'])
    ->middleware(['auth:web']);

