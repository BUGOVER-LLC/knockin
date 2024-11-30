<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\UI\API\Controllers;

use Nucleus\Exceptions\IncorrectIdException;
use Nucleus\Exceptions\InvalidTransformerException;
use Containers\DataSection\FileContainer\Actions\CreateFileContainerAction;
use Containers\DataSection\FileContainer\UI\API\Requests\CreateFileContainerRequest;
use Containers\DataSection\FileContainer\UI\API\Transformers\FileContainerTransformer;
use Ship\Exceptions\CreateResourceFailedException;
use Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateFileContainerController extends ApiController
{
    /**
     * @param CreateFileContainerRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createFileContainer(CreateFileContainerRequest $request): JsonResponse
    {
        $filecontainer = app(CreateFileContainerAction::class)->run($request);

        return $this->created($this->transform($filecontainer, FileContainerTransformer::class));
    }
}
