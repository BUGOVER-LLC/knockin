<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\UI\API\Controllers;

use Nucleus\Exceptions\InvalidTransformerException;
use Containers\DataSection\DataContainer\Actions\FindDataContainerByIdAction;
use Containers\DataSection\DataContainer\UI\API\Requests\FindDataContainerByIdRequest;
use Containers\DataSection\DataContainer\UI\API\Transformers\DataContainerTransformer;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Controllers\ApiController;

class FindDataContainerByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findDataContainerById(FindDataContainerByIdRequest $request): array
    {
        $datacontainer = app(FindDataContainerByIdAction::class)->run($request);

        return $this->transform($datacontainer, DataContainerTransformer::class);
    }
}
