<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Subscribe\UI\API\Controller;

use Nucleus\Exceptions\IncorrectIdException;
use Nucleus\Exceptions\InvalidResourceException;
use Containers\PaymentSection\Subscribe\Action\CreateSubscribeAction;
use Containers\PaymentSection\Subscribe\UI\API\Request\CreateSubscribeRequest;
use Containers\PaymentSection\Subscribe\UI\API\Resource\SubscribeResource;
use Ship\Exception\CreateResourceFailedException;
use Ship\Parent\Controller\ApiController;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Response;
use Symfony\Component\Routing\Attribute\Route;

class CreateSubscribeController extends ApiController
{
    /**
     * @param CreateSubscribeRequest $request
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
    public function createSubscribe(CreateSubscribeRequest $request): JsonResponse
    {
        $subscribe = app(CreateSubscribeAction::class)->run($request);

        return $this->created($this->transform($subscribe, SubscribeResource::class));
    }
}
