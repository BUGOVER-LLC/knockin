<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Src\Http\Controllers\App\DashboardIndexController;
use Src\Http\Controllers\Auth\CheckCodeAbstractController;
use Src\Http\Controllers\Auth\CheckEmailAbstractController;
use Src\Http\Controllers\Auth\CreateWorkspaceController;
use Src\Http\Controllers\Auth\GetWorkspaceController;
use Src\Http\Controllers\Auth\SignInController;
use Src\Http\Controllers\Greeting\GreetingIndexController;

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
    Route::get('/', SignInController::class)
        ->name('signInIndex'),

    Route::post('check-email', CheckEmailAbstractController::class)
        ->name('checkEmail'),

    Route::post('check-code', CheckCodeAbstractController::class)
        ->name('checkCode'),

    Route::get('workspaces', GetWorkspaceController::class)
        ->name('workspaces'),

    Route::post('createWorkspace', CreateWorkspaceController::class)
        ->name('createWorkspace'),

    Route::get('{any}', SignInController::class)
        ->where('any', '.*'),
]);

Route::group(
    ['middleware' => ['auth', 'auth.session'], 'prefix' => 'app', 'name' => 'app.', 'as' => 'app.'],
    static fn() => [
        Route::get('greeting/{target_id}', DashboardIndexController::class)
            ->name('greetingNoix'),

        Route::get('client/{target_id}/{second_target_id?}/{thread_target_id?}', DashboardIndexController::class)
            ->name('indexNoix'),

        Route::get('{app-any}', DashboardIndexController::class)->where('app-any', '.*'),
    ]
);
