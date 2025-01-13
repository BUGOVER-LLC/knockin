<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Subscribe\UI\API\Controller;

use Nucleus\Exceptions\IncorrectIdException;
use Nucleus\Exceptions\InvalidResourceException;
use Containers\PaymentSection\Subscribe\Action\UpdateSubscribeAction;
use Containers\PaymentSection\Subscribe\UI\API\Request\UpdateSubscribeRequest;
use Containers\PaymentSection\Subscribe\UI\API\Resource\SubscribeResource;
use Ship\Exception\NotFoundException;
use Ship\Exception\UpdateResourceFailedException;
use Ship\Parent\Controller\ApiController;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Put;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Response;
use Symfony\Component\Routing\Attribute\Route;

class UpdateSubscribeController extends ApiController
{
    /**
     * @param UpdateSubscribeRequest $request
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
    public function updateSubscribe(UpdateSubscribeRequest $request): array
    {
        $subscribe = app(UpdateSubscribeAction::class)->run($request);

        return $this->transform($subscribe, SubscribeResource::class);
    }
}
