<?php

/**
 * @apiGroup           User
 * @apiName            UpdateUser
 *
 * @api                {PATCH} /v1/users/:id Update User
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use Containers\DashboardSection\User\UI\API\Controllers\UpdateUserController;
use Illuminate\Support\Facades\Route;

Route::patch('users/{id}', [UpdateUserController::class, 'updateUser'])
    ->middleware(['auth:api']);

