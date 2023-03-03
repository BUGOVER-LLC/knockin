<?php

declare(strict_types=1);

use App\Http\Controllers\App\NoixIndexController;
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
Route::group(['middleware' => 'guest'], static fn () => [
    Route::get('/', GreetingIndexController::class)->name('greeting-index'),
]);

Route::group(['middleware' => 'guest', 'prefix' => 'signin'], static fn () => [
    Route::get('signin', SignInController::class)->name('sign-in-index'),
]);

Route::group(['middleware' => 'auth', 'prefix' => 'aloha'], static fn () => [
    Route::get('noix/{id}', NoixIndexController::class)->name('index-noix'),
]);
