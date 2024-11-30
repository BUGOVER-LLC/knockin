<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\UI\API\Controllers;

use Nucleus\Exceptions\IncorrectIdException;
use Nucleus\Exceptions\InvalidTransformerException;
use Containers\DataSection\FileContainer\Actions\UpdateFileContainerAction;
use Containers\DataSection\FileContainer\UI\API\Requests\UpdateFileContainerRequest;
use Containers\DataSection\FileContainer\UI\API\Transformers\FileContainerTransformer;
use Ship\Exceptions\NotFoundException;
use Ship\Exceptions\UpdateResourceFailedException;
use Ship\Parents\Controllers\ApiController;

class UpdateFileContainerController extends ApiController
{
    /**
     * @param UpdateFileContainerRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateFileContainer(UpdateFileContainerRequest $request): array
    {
        $filecontainer = app(UpdateFileContainerAction::class)->run($request);

        return $this->transform($filecontainer, FileContainerTransformer::class);
    }
}
