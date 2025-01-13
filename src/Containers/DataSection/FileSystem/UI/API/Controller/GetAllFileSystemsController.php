<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\UI\API\Controllers;

use Nucleus\Exceptions\CoreInternalErrorException;
use Nucleus\Exceptions\InvalidResourceException;
use Containers\DataSection\FileSystem\Actions\GetAllFileSystemsAction;
use Containers\DataSection\FileSystem\UI\API\Requests\GetAllFileSystemsRequest;
use Containers\DataSection\FileSystem\UI\API\Resource\FileSystemResource;
use Ship\Parent\Controller\ApiController;

class GetAllFileSystemsController extends ApiController
{
    /**
     * @throws InvalidResourceException
     * @throws CoreInternalErrorException
     */
    public function getAllFileSystems(GetAllFileSystemsRequest $request): array
    {
        $filesystems = app(GetAllFileSystemsAction::class)->run($request);

        return $this->transform($filesystems, FileSystemResource::class);
    }
}
