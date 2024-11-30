<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\UI\API\Controllers;

use Nucleus\Exceptions\CoreInternalErrorException;
use Nucleus\Exceptions\InvalidTransformerException;
use Containers\DataSection\FileContainer\Actions\GetAllFileContainersAction;
use Containers\DataSection\FileContainer\UI\API\Requests\GetAllFileContainersRequest;
use Containers\DataSection\FileContainer\UI\API\Transformers\FileContainerTransformer;
use Ship\Parents\Controllers\ApiController;

class GetAllFileContainersController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     */
    public function getAllFileContainers(GetAllFileContainersRequest $request): array
    {
        $filecontainers = app(GetAllFileContainersAction::class)->run($request);

        return $this->transform($filecontainers, FileContainerTransformer::class);
    }
}
