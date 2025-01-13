<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\UI\API\Controller;

use Nucleus\Exceptions\InvalidResourceException;
use Containers\AuthSection\Plan\Action\FindPlanByIdAction;
use Containers\AuthSection\Plan\UI\API\Requests\FindPlanByIdRequest;
use Containers\AuthSection\Plan\UI\API\Resource\PlanResource;
use Ship\Exception\NotFoundException;
use Ship\Parent\Controller\ApiController;

class FindPlanByIdController extends ApiController
{
    /**
     * @throws InvalidResourceException|NotFoundException
     */
    public function findPlanById(FindPlanByIdRequest $request): array
    {
        $plan = app(FindPlanByIdAction::class)->run($request);

        return $this->transform($plan, PlanResource::class);
    }
}
