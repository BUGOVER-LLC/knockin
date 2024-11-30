<?php

declare(strict_types=1);

/**
 * @apiGroup           DataContainer
 * @apiName            DeleteDataContainer
 *
 * @api                {DELETE} /v1/data-containers/:id Delete Data Container
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

use Containers\DataSection\DataContainer\UI\API\Controllers\DeleteDataContainerController;
use Illuminate\Support\Facades\Route;

Route::delete('data-containers/{id}', [DeleteDataContainerController::class, 'deleteDataContainer'])
    ->middleware(['auth:api']);

