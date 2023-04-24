<?php

declare(strict_types=1);

use App\Http\Controllers\App\NoixIndexController;
use App\Http\Controllers\App\SendMessage;
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

Route::group(['middleware' => 'guest', 'prefix' => 'signin'], static fn() => [
    Route::get('/', SignInController::class)->name('sign-in-index'),
    Route::get('{auth-any}', SignInController::class)->where('auth-any', '.*'),
]);

Route::group(['middleware' => [], 'prefix' => 'noix'], static fn() => [
    Route::get('/{workspace_id}', NoixIndexController::class)->name('index-noix'),
    Route::post('init-msg', SendMessage::class),

    Route::get('{app-any}', NoixIndexController::class)->where('app-any', '.*'),
]);
