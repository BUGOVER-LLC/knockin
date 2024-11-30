<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\UI\API\Controllers;

use Containers\DataSection\FileContainer\Actions\DeleteFileContainerAction;
use Containers\DataSection\FileContainer\UI\API\Requests\DeleteFileContainerRequest;
use Ship\Exceptions\DeleteResourceFailedException;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteFileContainerController extends ApiController
{
    /**
     * @param DeleteFileContainerRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteFileContainer(DeleteFileContainerRequest $request): JsonResponse
    {
        app(DeleteFileContainerAction::class)->run($request);

        return $this->noContent();
    }
}
