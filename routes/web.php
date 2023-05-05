<?php

declare(strict_types=1);

use App\Http\Controllers\App\DashboardIndexController;
use App\Http\Controllers\Auth\CheckCodeController;
use App\Http\Controllers\Auth\CheckEmailController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Greeting\GreetingIndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'guest'], static fn() => [
    Route::get('/', GreetingIndexController::class)->name('greeting-index'),
]);

Route::group(['middleware' => ['guest', 'set_auth_payload'], 'prefix' => 'auth'], static fn() => [
    Route::get('/', SignInController::class)->name('sign-in-index'),
    Route::post('check-email', CheckEmailController::class),
    Route::post('check-code', CheckCodeController::class),

    Route::get('{any}', SignInController::class)->where('any', '.*'),
]);

Route::group(['middleware' => [], 'prefix' => 'app', 'name' => 'app.', 'as' => 'app.'],
    static fn() => [
        Route::get('client/{target_id}/{second_target_id?}/{thread_target_id?}', DashboardIndexController::class)
            ->name('index-noix'),

//        Route::get('greeting/{target_id}', DashboardIndexController::class)
//            ->name('greeting-noix'),

        Route::get('{app-any}', DashboardIndexController::class)->where('app-any', '.*'),
    ]);
