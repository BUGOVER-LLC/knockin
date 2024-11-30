<?php

declare(strict_types=1);

/**
 * @apiGroup           FileContainer
 * @apiName            UpdateFileContainer
 *
 * @api                {PATCH} /v1/file-containers/:id Update File Container
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

use Containers\DataSection\FileContainer\UI\API\Controllers\UpdateFileContainerController;
use Illuminate\Support\Facades\Route;

Route::patch('file-containers/{id}', [UpdateFileContainerController::class, 'updateFileContainer'])
    ->middleware(['auth:api']);

