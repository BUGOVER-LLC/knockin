<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\UI\API\Controllers;

use Nucleus\Exceptions\IncorrectIdException;
use Nucleus\Exceptions\InvalidResourceException;
use Containers\DataSection\FileSystem\Actions\UpdateFileSystemAction;
use Containers\DataSection\FileSystem\UI\API\Requests\UpdateFileSystemRequest;
use Containers\DataSection\FileSystem\UI\API\Resource\FileSystemResource;
use Ship\Exceptions\NotFoundException;
use Ship\Exceptions\UpdateResourceFailedException;
use Ship\Parents\Controllers\ApiController;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Put;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Response;
use Symfony\Component\Routing\Attribute\Route;

class UpdateFileSystemController extends ApiController
{
    /**
     * @param UpdateFileSystemRequest $request
     * @return array
     * @throws InvalidResourceException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    #[Route(path: '/', methods: ['PUT'])]
    #[
         Put(
             path: '/',
             description: 'create',
             summary: '',
             tags: [''],
             responses: [
                 new Response(
                     response: 200,
                     description: 'Get to Update',
                     content: new JsonContent(properties: [
                         new Property(
                             property: '_payload',
                             type: 'Schema'
                         ),
                     ])
                 ),
             ]
         ),
    ]
    public function updateFileSystem(UpdateFileSystemRequest $request): array
    {
        $filesystem = app(UpdateFileSystemAction::class)->run($request);

        return $this->transform($filesystem, FileSystemResource::class);
    }
}
