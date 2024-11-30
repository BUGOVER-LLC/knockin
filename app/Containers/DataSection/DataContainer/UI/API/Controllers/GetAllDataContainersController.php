<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\UI\API\Controllers;

use Nucleus\Exceptions\CoreInternalErrorException;
use Nucleus\Exceptions\InvalidTransformerException;
use Containers\DataSection\DataContainer\Actions\GetAllDataContainersAction;
use Containers\DataSection\DataContainer\UI\API\Requests\GetAllDataContainersRequest;
use Containers\DataSection\DataContainer\UI\API\Transformers\DataContainerTransformer;
use Ship\Parents\Controllers\ApiController;

class GetAllDataContainersController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     */
    public function getAllDataContainers(GetAllDataContainersRequest $request): array
    {
        $datacontainers = app(GetAllDataContainersAction::class)->run($request);

        return $this->transform($datacontainers, DataContainerTransformer::class);
    }
}
