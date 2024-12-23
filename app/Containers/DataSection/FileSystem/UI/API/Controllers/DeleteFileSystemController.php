<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\UI\API\Controllers;

use Containers\DataSection\FileSystem\Actions\DeleteFileSystemAction;
use Containers\DataSection\FileSystem\UI\API\Requests\DeleteFileSystemRequest;
use Ship\Exceptions\DeleteResourceFailedException;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteFileSystemController extends ApiController
{
    /**
     * @param DeleteFileSystemRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteFileSystem(DeleteFileSystemRequest $request): JsonResponse
    {
        app(DeleteFileSystemAction::class)->run($request);

        return $this->noContent();
    }
}
