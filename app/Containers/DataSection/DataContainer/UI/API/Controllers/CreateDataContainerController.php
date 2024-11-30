<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\UI\API\Controllers;

use Nucleus\Exceptions\IncorrectIdException;
use Nucleus\Exceptions\InvalidTransformerException;
use Containers\DataSection\DataContainer\Actions\CreateDataContainerAction;
use Containers\DataSection\DataContainer\UI\API\Requests\CreateDataContainerRequest;
use Containers\DataSection\DataContainer\UI\API\Transformers\DataContainerTransformer;
use Ship\Exceptions\CreateResourceFailedException;
use Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateDataContainerController extends ApiController
{
    /**
     * @param CreateDataContainerRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createDataContainer(CreateDataContainerRequest $request): JsonResponse
    {
        $datacontainer = app(CreateDataContainerAction::class)->run($request);

        return $this->created($this->transform($datacontainer, DataContainerTransformer::class));
    }
}
