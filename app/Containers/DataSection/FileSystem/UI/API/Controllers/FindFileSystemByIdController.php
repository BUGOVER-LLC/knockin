<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\UI\API\Controllers;

use Nucleus\Exceptions\InvalidResourceException;
use Containers\DataSection\FileSystem\Actions\FindFileSystemByIdAction;
use Containers\DataSection\FileSystem\UI\API\Requests\FindFileSystemByIdRequest;
use Containers\DataSection\FileSystem\UI\API\Resource\FileSystemResource;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Controllers\ApiController;

class FindFileSystemByIdController extends ApiController
{
    /**
     * @throws InvalidResourceException|NotFoundException
     */
    public function findFileSystemById(FindFileSystemByIdRequest $request): array
    {
        $filesystem = app(FindFileSystemByIdAction::class)->run($request);

        return $this->transform($filesystem, FileSystemResource::class);
    }
}
