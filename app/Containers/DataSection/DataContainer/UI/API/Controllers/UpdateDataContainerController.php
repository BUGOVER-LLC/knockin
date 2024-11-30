<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\UI\API\Controllers;

use Nucleus\Exceptions\IncorrectIdException;
use Nucleus\Exceptions\InvalidTransformerException;
use Containers\DataSection\DataContainer\Actions\UpdateDataContainerAction;
use Containers\DataSection\DataContainer\UI\API\Requests\UpdateDataContainerRequest;
use Containers\DataSection\DataContainer\UI\API\Transformers\DataContainerTransformer;
use Ship\Exceptions\NotFoundException;
use Ship\Exceptions\UpdateResourceFailedException;
use Ship\Parents\Controllers\ApiController;

class UpdateDataContainerController extends ApiController
{
    /**
     * @param UpdateDataContainerRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateDataContainer(UpdateDataContainerRequest $request): array
    {
        $datacontainer = app(UpdateDataContainerAction::class)->run($request);

        return $this->transform($datacontainer, DataContainerTransformer::class);
    }
}
