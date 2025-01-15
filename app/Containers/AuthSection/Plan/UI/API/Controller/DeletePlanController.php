<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\UI\API\Controller;

use Containers\AuthSection\Plan\Action\DeletePlanAction;
use Containers\AuthSection\Plan\UI\API\Requests\DeletePlanRequest;
use Ship\Exception\DeleteResourceFailedException;
use Ship\Exception\NotFoundException;
use Ship\Parent\Controller\ApiController;
use Illuminate\Http\JsonResponse;

class DeletePlanController extends ApiController
{
    /**
     * @param DeletePlanRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deletePlan(DeletePlanRequest $request): JsonResponse
    {
        app(DeletePlanAction::class)->run($request);

        return $this->noContent();
    }
}
