<?php

/**
 * @apiGroup           User
 * @apiName            FindUserById
 *
 * @api                {GET} /v1/users/:id Find User By Id
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

use Containers\DashboardSection\User\UI\API\Controllers\FindUserByIdController;
use Illuminate\Support\Facades\Route;

Route::get('users/{id}', [FindUserByIdController::class, 'findUserById'])
    ->middleware(['auth:api']);

