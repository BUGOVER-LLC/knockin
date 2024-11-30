<?php

declare(strict_types=1);

/**
 * @apiGroup           DataContainer
 * @apiName            GetAllDataContainers
 *
 * @api                {GET} /v1/data-containers Get All Data Containers
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

use Containers\DataSection\DataContainer\UI\API\Controllers\GetAllDataContainersController;
use Illuminate\Support\Facades\Route;

Route::get('data-containers', [GetAllDataContainersController::class, 'getAllDataContainers'])
    ->middleware(['auth:api']);

