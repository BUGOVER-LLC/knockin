<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\UI\API\Controller;

use Nucleus\Exceptions\IncorrectIdException;
use Nucleus\Exceptions\InvalidResourceException;
use Containers\AuthSection\Plan\Action\UpdatePlanAction;
use Containers\AuthSection\Plan\UI\API\Requests\UpdatePlanRequest;
use Containers\AuthSection\Plan\UI\API\Resource\PlanResource;
use Ship\Exception\NotFoundException;
use Ship\Exception\UpdateResourceFailedException;
use Ship\Parent\Controller\ApiController;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Put;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Response;
use Symfony\Component\Routing\Attribute\Route;

class UpdatePlanController extends ApiController
{
    /**
     * @param UpdatePlanRequest $request
     * @return array
     * @throws InvalidResourceException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    #[Route(path: '/', methods: ['PUT'])]
    #[
         Put(
             path: '/',
             description: 'create',
             summary: '',
             tags: [''],
             responses: [
                 new Response(
                     response: 200,
                     description: 'Get to Update',
                     content: new JsonContent(properties: [
                         new Property(
                             property: '_payload',
                             type: 'Schema'
                         ),
                     ])
                 ),
             ]
         ),
    ]
    public function updatePlan(UpdatePlanRequest $request): array
    {
        $plan = app(UpdatePlanAction::class)->run($request);

        return $this->transform($plan, PlanResource::class);
    }
}
