<?php

declare(strict_types=1);

/**
 * @apiGroup           Auth
 * @apiName            GetAllAuths
 *
 * @api                {GET} /v1/auths Get All Auths
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

use Containers\AuthSection\Auth\UI\API\Controllers\GetAllAuthsController;
use Illuminate\Support\Facades\Route;

Route::get('auths', [GetAllAuthsController::class, 'getAllAuths'])
    ->middleware(['auth:api']);

