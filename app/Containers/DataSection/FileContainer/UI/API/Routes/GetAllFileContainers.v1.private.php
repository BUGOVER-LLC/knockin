<?php

declare(strict_types=1);

/**
 * @apiGroup           FileContainer
 * @apiName            GetAllFileContainers
 *
 * @api                {GET} /v1/file-containers Get All File Containers
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

use Containers\DataSection\FileContainer\UI\API\Controllers\GetAllFileContainersController;
use Illuminate\Support\Facades\Route;

Route::get('file-containers', [GetAllFileContainersController::class, 'getAllFileContainers'])
    ->middleware(['auth:api']);

