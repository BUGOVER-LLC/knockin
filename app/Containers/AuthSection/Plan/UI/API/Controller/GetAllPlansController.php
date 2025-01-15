<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\UI\API\Controller;

use Nucleus\Exceptions\CoreInternalErrorException;
use Nucleus\Exceptions\InvalidResourceException;
use Containers\AuthSection\Plan\Action\GetAllPlansAction;
use Containers\AuthSection\Plan\UI\API\Requests\GetAllPlansRequest;
use Containers\AuthSection\Plan\UI\API\Resource\PlanResource;
use Ship\Parent\Controller\ApiController;

class GetAllPlansController extends ApiController
{
    /**
     * @throws InvalidResourceException
     * @throws CoreInternalErrorException
     */
    public function getAllPlans(GetAllPlansRequest $request): array
    {
        $plans = app(GetAllPlansAction::class)->run($request);

        return $this->transform($plans, PlanResource::class);
    }
}
