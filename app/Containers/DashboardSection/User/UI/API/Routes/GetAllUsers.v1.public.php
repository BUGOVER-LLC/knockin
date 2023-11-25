<?php

/**
 * @apiGroup           User
 * @apiName            GetAllUsers
 *
 * @api                {GET} /v1/users Get All Users
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

use Containers\DashboardSection\User\UI\API\Controllers\GetAllUsersController;
use Illuminate\Support\Facades\Route;

Route::get('users', [GetAllUsersController::class, 'getAllUsers'])
    ->middleware(['auth:api']);

