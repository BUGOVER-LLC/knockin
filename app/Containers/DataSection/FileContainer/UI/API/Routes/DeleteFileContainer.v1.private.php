<?php

declare(strict_types=1);

/**
 * @apiGroup           FileContainer
 * @apiName            DeleteFileContainer
 *
 * @api                {DELETE} /v1/file-containers/:id Delete File Container
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

use Containers\DataSection\FileContainer\UI\API\Controllers\DeleteFileContainerController;
use Illuminate\Support\Facades\Route;

Route::delete('file-containers/{id}', [DeleteFileContainerController::class, 'deleteFileContainer'])
    ->middleware(['auth:api']);

