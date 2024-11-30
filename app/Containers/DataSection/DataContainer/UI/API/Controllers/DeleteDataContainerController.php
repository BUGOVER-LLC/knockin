<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\UI\API\Controllers;

use Containers\DataSection\DataContainer\Actions\DeleteDataContainerAction;
use Containers\DataSection\DataContainer\UI\API\Requests\DeleteDataContainerRequest;
use Ship\Exceptions\DeleteResourceFailedException;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteDataContainerController extends ApiController
{
    /**
     * @param DeleteDataContainerRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteDataContainer(DeleteDataContainerRequest $request): JsonResponse
    {
        app(DeleteDataContainerAction::class)->run($request);

        return $this->noContent();
    }
}
