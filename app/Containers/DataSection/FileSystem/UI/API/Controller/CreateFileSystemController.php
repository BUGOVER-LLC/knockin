<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\UI\API\Controllers;

use Nucleus\Exceptions\IncorrectIdException;
use Nucleus\Exceptions\InvalidResourceException;
use Containers\DataSection\FileSystem\Actions\CreateFileSystemAction;
use Containers\DataSection\FileSystem\UI\API\Requests\CreateFileSystemRequest;
use Containers\DataSection\FileSystem\UI\API\Resource\FileSystemResource;
use Ship\Exception\CreateResourceFailedException;
use Ship\Parent\Controller\ApiController;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Response;
use Symfony\Component\Routing\Attribute\Route;

class CreateFileSystemController extends ApiController
{
    /**
     * @param CreateFileSystemRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidResourceException
     * @throws IncorrectIdException
     */
     #[Route(path: '/', methods: ['POST'])]
     #[
         Post(
             path: '/',
             description: 'create',
             summary: '',
             tags: [''],
             responses: [
                 new Response(
                     response: 200,
                     description: 'Get to create',
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
    public function createFileSystem(CreateFileSystemRequest $request): JsonResponse
    {
        $filesystem = app(CreateFileSystemAction::class)->run($request);

        return $this->created($this->transform($filesystem, FileSystemResource::class));
    }
}
