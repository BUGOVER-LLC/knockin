<?php

declare(strict_types=1);

/**
 * @apiGroup           Auth
 * @apiName            DeleteAuth
 *
 * @api                {DELETE} /v1/auths/:id Delete Auth
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

use Containers\AuthSection\Auth\UI\API\Controllers\DeleteAuthController;
use Illuminate\Support\Facades\Route;

Route::delete('auths/{id}', [DeleteAuthController::class, 'deleteAuth'])
    ->middleware(['auth:api']);

