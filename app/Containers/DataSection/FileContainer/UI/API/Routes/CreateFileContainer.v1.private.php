<?php

declare(strict_types=1);

/**
 * @apiGroup           FileContainer
 * @apiName            CreateFileContainer
 *
 * @api                {POST} /v1/file-containers Create File Container
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

use Containers\DataSection\FileContainer\UI\API\Controllers\CreateFileContainerController;
use Illuminate\Support\Facades\Route;

Route::post('file-containers', [CreateFileContainerController::class, 'createFileContainer'])
    ->middleware(['auth:api']);

