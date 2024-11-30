<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\UI\API\Controllers;

use Nucleus\Exceptions\InvalidTransformerException;
use Containers\DataSection\FileContainer\Actions\FindFileContainerByIdAction;
use Containers\DataSection\FileContainer\UI\API\Requests\FindFileContainerByIdRequest;
use Containers\DataSection\FileContainer\UI\API\Transformers\FileContainerTransformer;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Controllers\ApiController;

class FindFileContainerByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findFileContainerById(FindFileContainerByIdRequest $request): array
    {
        $filecontainer = app(FindFileContainerByIdAction::class)->run($request);

        return $this->transform($filecontainer, FileContainerTransformer::class);
    }
}
