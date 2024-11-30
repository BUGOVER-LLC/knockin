<?php

declare(strict_types=1);

/**
 * @apiGroup           Auth
 * @apiName            CreateAuth
 *
 * @api                {POST} /v1/auths Create Auth
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

use Containers\AuthSection\Auth\UI\API\Controllers\CreateAuthController;
use Illuminate\Support\Facades\Route;

Route::post('auths', [CreateAuthController::class, 'createAuth'])
    ->middleware(['auth:api']);

