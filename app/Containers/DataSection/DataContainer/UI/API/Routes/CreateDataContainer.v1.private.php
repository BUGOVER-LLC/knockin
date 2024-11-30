<?php

declare(strict_types=1);

/**
 * @apiGroup           DataContainer
 * @apiName            CreateDataContainer
 *
 * @api                {POST} /v1/data-containers Create Data Container
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

use Containers\DataSection\DataContainer\UI\API\Controllers\CreateDataContainerController;
use Illuminate\Support\Facades\Route;

Route::post('data-containers', [CreateDataContainerController::class, 'createDataContainer'])
    ->middleware(['auth:api']);

