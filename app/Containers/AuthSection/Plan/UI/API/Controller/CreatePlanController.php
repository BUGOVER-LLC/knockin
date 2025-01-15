<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\UI\API\Controller;

use Nucleus\Exceptions\IncorrectIdException;
use Nucleus\Exceptions\InvalidResourceException;
use Containers\AuthSection\Plan\Action\CreatePlanAction;
use Containers\AuthSection\Plan\UI\API\Requests\CreatePlanRequest;
use Containers\AuthSection\Plan\UI\API\Resource\PlanResource;
use Ship\Exception\CreateResourceFailedException;
use Ship\Parent\Controller\ApiController;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Response;
use Symfony\Component\Routing\Attribute\Route;

class CreatePlanController extends ApiController
{
    /**
     * @param CreatePlanRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidResourceException
     * @throws IncorrectIdException
     */
     #[Route(path: '/', methods: ['POST'])]
     #[
         Post(
             path: '/',
             description: 'create',
             summary: '',
             tags: [''],
             responses: [
                 new Response(
                     response: 200,
                     description: 'Get to create',
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
    public function createPlan(CreatePlanRequest $request): JsonResponse
    {
        $plan = app(CreatePlanAction::class)->run($request);

        return $this->created($this->transform($plan, PlanResource::class));
    }
}
